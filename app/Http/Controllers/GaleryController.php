<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\GaleryRequest;
use App\Galery;

use Session;
use Redirect;
use DB;
use Gate;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.galery.more');
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
    public function show()
    {
        if (Gate::denies('show.galery')) {
            abort(403);
        }
        
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
    }
}
