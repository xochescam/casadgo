<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NoticeRequest;
use App\Notice;
use App\Media;
use App\MediaNotice;
use Carbon\Carbon;

use Session;
use Redirect;
use DB;
use Gate;
use Auth;
use File;
use Validator;
use Storage;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('show.notice')) {
            abort(403);
        }

        $notices = Notice::get()->sortByDesc('created_at');

        return view('admin.notices.list',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create.notice')) {
            abort(403);
        }

        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        if (Gate::denies('create.notice')) {
            abort(403);
        }

        $save = DB::transaction(function () use ($request) {
            $fileData = Notice::saveData($request);
            return $fileData;
        });


        if($save) {
            Session::flash('message','Guardada correctamente');
            return Redirect::to('/noticias/crear');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $searchItem = Notice::where('id',$id)->with('media')->get();

        $item = $searchItem->mapWithKeys(function ($item) {

            $media = $item->media->groupBy('type')->toArray();

            setlocale(LC_TIME, 'Spanish');
            $date = Carbon::parse($item->date)->formatLocalized('%A %d %B %Y');
       
            return [
                    'id'          => $item->id,
                    'date'        => $date,
                    'title'       => $item->title,
                    'description' => $item->description,
                    'items'       => $media
                ];

            
        })->toArray();

        return view('partials.notices.show',compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit.notice')) {
            abort(403);
        }

        $notice = Notice::findOrFail($id);

        $type = $notice->media->groupBy('type')->map(function ($item, $key) {
                return $item->sortByDesc('created_at');
            });

        return view('admin.notices.edit',compact('notice','type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, $id)
    {
        if (Gate::denies('edit.notice')) {
            abort(403);
        }

        $save = DB::transaction(function () use ($request, $id) {
            $fileData = Notice::updateData($request, $id);
            return $fileData;
        });

        if($save) {
            Session::flash('message','Cambios guardados correctamente');
            return Redirect::to('/noticias/'.$id.'/editar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('destroy.notice')) {
            abort(403);
        }

        $searchItem = Notice::find($id);
        $mediaNotice = MediaNotice::where('notice_id',$id)->get();

        $path = 'storage/notices/'.$searchItem->slug.'-'.$id;

        $deleted = File::deleteDirectory($path);

        $searchItem->media()->delete();

        $searchItem->delete();
        
        foreach ($mediaNotice as $key => $value) {
            $value->delete();
        }

        return;
    }

    public function destroyItem($id)
    {
        if (Gate::denies('destroy.notice')) {
            abort(403);
        }

        $item = Media::with('notice')->where('id',$id)->get()->first();
        $mediaNotice = MediaNotice::where('media_id',$id)->get()->first();

        $path = $item->url.$item->name;
        $pathThumb = $item->url.'thumb-'.$item->name;


        $deleted = File::delete($path, $pathThumb);

        $item->delete();
        $mediaNotice->delete();
      
        Session::flash('message','Se ha eliminado la imagen correctamente.');
        return redirect()->back();

    }

    public function validationImg($imgs) {
        $mime = ['jpeg','jpg','png'];

        $validator = Validator::make($imgs, []);

        foreach ($imgs as $key => $value) {
            $name    = $value->getClientOriginalName();
            $explode = explode('.',strtolower($name));

            if(!in_array($explode[1], $mime)) {
                $validator->errors()->add('img', 'El archivo "'.$name.'" no es del formato permitido.');
            }
        }

        return $validator;
    }

    public function validationVideo($videos) {
        $validator = Validator::make($videos, []);

        foreach ($videos as $key => $value) {
            $regex  = "/^(https?\:\/\/)?(www\.)?(youtube\.com)\/.+$/"; 
            $number = $key + 1;

            $idVideo = explode('watch?v=',$value);

            if(!preg_match($regex, $value, $output) || !isset($idVideo[1])) {

                $validator->errors()->add('img', 'El video "'.$number.'" no es del formato correcto.');
            }
        } 

        return $validator;
    }
}
