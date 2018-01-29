<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;

class Galery extends Model
{
	protected $table = 'galeries';
	protected $fillable = ['id', 'title', 'slug'];


    public function media(){
        return $this->belongsToMany('\App\Media','media_galeries');
    }

	public static function saveData($request){

        if(isset($request->img)) {

            $file = Media::saveImg(1, $request->img, 'galery/');

        } else {

            $file = Media::saveVideo(1, $request->video);
        }

		$galeryData = new Galery;

        $galeryData->title    = $request->title;
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
