<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;
use App\MediaGalery;

class Galery extends Model
{
	protected $table = 'galeries';
	protected $fillable = ['id', 'title', 'slug'];


    public function media(){
        return $this->belongsToMany('\App\Media','media_galeries');
    }

	public static function saveData($request){
        $slug = str_replace(" ","-",strtolower($request->title));

        $galeryData = new Galery;

        $galeryData->slug        = $slug;
        $galeryData->title       = $request->title;
        $galeryData->save();


        $nameFolder = 'galery/'.$slug.'-'.$galeryData->id.'/';

        if(isset($request->img)) {
            foreach ($request->img as $imgKey => $imgValue) {
                $saveImage   = Media::saveImg($imgKey, $imgValue, $nameFolder);
                $mediaGalery = MediaGalery::saveData($saveImage->id, $galeryData->id);
            }
        } 

        if(isset($request->videos[0])) {
            foreach ($request->videos as $videoKey => $videoValue) {

                $saveVideo   = Media::saveVideo($videoKey, $videoValue);
                $mediaGalery = MediaGalery::saveData($saveVideo->id, $galeryData->id);
            }
        }

        return 'true';
    }

    public static function updateData($request, $id){

        $galeryData = Galery::findOrFail($id);

        $galeryData->title       = $request->title;
        $galeryData->description = $request->description;;
        $galeryData->save();

        return $galeryData;
    }
}
