<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;

use App\Http\Requests\GaleryRequest;
use App\Galery;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.more-galery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $imageData = new Galery();
        $imageData = $imageData->saveData($request);

        if($imageData) {
            Session::flash('message','Guardada correctamente');
            return Redirect::to('/subir-foto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.galery.read');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }
}
