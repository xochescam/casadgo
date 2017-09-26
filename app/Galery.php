<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
	protected $table = 'galeries';
	protected $fillable = ['id', 'name', 'description', 'media_id'];


	public function media()
    {
        return $this->belongsTo('App\Media');
    }

	public static function saveData($request){

		$image = new Media();
		$image = $image->saveImage($request);

		$imageData = new Galery;

        $imageData->name        = $request->name;
        $imageData->description = $request->description;
        $imageData->media_id    = $image->id;
        $imageData->save();

        return $imageData;
    }

    public static function updateData($request, $id){

        $dataImage = Galery::findOrFail($id);

        $dataImage->name        = $request->name;
        $dataImage->description = $request->description;;
        $dataImage->save();

        return $dataImage;
    }
}
