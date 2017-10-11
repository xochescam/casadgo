<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;

class Galery extends Model
{
	protected $table = 'galeries';
	protected $fillable = ['id', 'title', 'media_id'];


	public function media()
    {
        return $this->belongsTo('App\Media','media_id');
    }

	public static function saveData($request){

		$file = Media::saveVideoOrImage($request, 'galery/', 0);

		$galeryData = new Galery;

        $galeryData->title    = $request->title;
        $galeryData->media_id = $file->id;
        $galeryData->save();

        return $galeryData;
    }

    public static function updateData($request, $id){

        $galeryData = Galery::findOrFail($id);

        $galeryData->title       = $request->title;
        $galeryData->description = $request->description;;
        $galeryData->save();

        return $galeryData;
    }
}
