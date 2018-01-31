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

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $notice = Notice::findOrFail($id);
        $type   = $notice->media->groupBy('type');

        return view('partials.notices.show',compact('notice','type'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAdmin($id)
    {
        $notice = Notice::findOrFail($id);
        $type   = $notice->media->groupBy('type');

        return view('admin.notices.show',compact('notice','type'));
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

        return view('admin.notices.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('edit.notice')) {
            abort(403);
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

        $urlFolder = public_path('storage\notices'.$searchItem->slug);


        // foreach ($searchItem->media as $key => $media) {

        //     $urlFile = public_path($media->url.$media->name);

        //     if(file_exists($urlFile)){
        //       unlink($urlFile);
        //     }
        // }

        File::deleteDirectory($urlFolder);

        $searchItem->media()->delete();

        $searchItem->delete();
        
        foreach ($mediaNotice as $key => $value) {
            $value->delete();
        }

        return;
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
