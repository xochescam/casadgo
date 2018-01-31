<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GaleryRequest;
use App\Galery;
use App\Media;
use App\MediaGalery;

use Session;
use Redirect;
use DB;
use Gate;
use File;
use Validator;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Galery::get()->sortByDesc('created_at');

        return view('admin.galery.list', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Gate::denies('create.galery')) {
            abort(403);
        }

        return view('admin.galery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleryRequest $request)
    {
        if (Gate::denies('create.galery')) {
            abort(403);
        }

        $save = DB::transaction(function () use ($request) {
            $fileData = Galery::saveData($request);
            return $fileData;
        });

        if($save) {
            return 'success';
            Session::flash('message','Guardada correctamente');
            return Redirect::to('/galeria/crear');
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
        if (Gate::denies('show.galery')) {
            abort(403);
        }

        $searchItem = Galery::where('id',$id)->with('media')->get();

        $item = $searchItem->mapWithKeys(function ($item) {

            $media = $item->media->groupBy('type')->toArray();

            return [   'id' => $item->id,
                    'title' => $item->title,
                    'items' => $media];

            
        })->toArray();
        
        return view('admin.galery.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit.galery')) {
            abort(403);
        }

        $galery = Galery::findOrFail($id);

        return view('admin.galery.edit',compact('galery'));
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
        if (Gate::denies('edit.galery')) {
            abort(403);
        }

        $galery = new Galery();
        $galery = $galery->updateData($request, $id);

        if($galery) {
            Session::flash('message','Modificada correctamente');
            return view('admin.galery.edit',compact('galery'));
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
        if (Gate::denies('delete.galery')) {
            abort(403);
        }

        $searchItem = Galery::find($id);
        $mediaGalery = MediaGalery::where('galery_id',$id)->get();

        $urlFolder = public_path('storage\galery'.$searchItem->slug);

        // foreach ($searchItem->media as $key => $media) {

        //     $urlFile = public_path($media->url.$media->name);

        //     if(file_exists($urlFile)){
        //       unlink($urlFile);
        //     }
        // }

        File::deleteDirectory($urlFolder);

        $searchItem->media()->delete();

        $searchItem->delete();
        foreach ($mediaGalery as $key => $value) {
   
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
