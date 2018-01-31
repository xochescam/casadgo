<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGalery extends Model
{
	protected $table = 'media_galeries';
	protected $fillable = ['id','media_id', 'galery_id'];

	public static function saveData($fileId, $galeryId){

        $mediaGalery = new MediaGalery;

        $mediaGalery->media_id  = $fileId;
        $mediaGalery->galery_id = $galeryId;

        $mediaGalery->save();

        return 'true';
    }
}
