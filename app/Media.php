<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Media extends Model
{
	protected $table = 'media';
	protected $fillable = ['id', 'name', 'url', 'type'];

	public function galery()
    {
        return $this->hasOne('App\Galery');
    }

	public static function saveImage($request){

		$media     = $request->img;
		$typeMedia = explode("/", $media->getClientMimeType());

		if($typeMedia[0] == 'image') {

			$type = 'img';

		} else {

			$type = 'video';
		}

		$now = Carbon::now()->toDateTimeString();
		$doblepoint = str_replace(":", "", $now);
		$middle     = str_replace("-", "", $doblepoint);
		$name       = str_replace(" ", "", $middle);



		if($media != null){
            $originalNameFiles = $media->getClientOriginalName();
            $extFiles =  strtolower(pathinfo($originalNameFiles, PATHINFO_EXTENSION));
            $newNameFiles = $name.".".$extFiles;

            \Storage::disk('local')->put("galery/".$newNameFiles,  \File::get($media));
        }

		$media = new Media;

        $media->name = $newNameFiles;
        $media->url  = '/galery/';
        $media->type = $type;
        $media->save();

        return $media;

    }
}
