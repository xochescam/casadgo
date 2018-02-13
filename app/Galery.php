<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;
use App\MediaGalery;

class Galery extends Model
{
	protected $table = 'galeries';
	protected $fillable = ['id', 'title','description', 'slug','date'];


    public function media(){
        return $this->belongsToMany('\App\Media','media_galeries');
    }

	public static function saveData($request){
        $slug = str_replace(" ","-",strtolower($request->title));

        $galeryData = new Galery;

        $galeryData->slug        = $slug;
        $galeryData->title       = $request->title;
        $galeryData->description = $request->description;
        $galeryData->date        = $request->date;
        $galeryData->save();

        $nameFolder = 'galery/'.$slug.'-'.$galeryData->id.'/';
        
        $imagenes = static::getImages($request, $galeryData, $nameFolder);

        $videos = static::getVideos($request, $galeryData);

        return true;
    }

    public static function updateData($request, $id){

        $galery = Galery::findOrFail($id);
        $media  = $galery->media()->where('type','video')->get();

        $galery->title       = $request->title;
        $galery->description = $request->description;
        $galery->date        = $request->date;
        $galery->save();

        foreach ($media as $key => $value) {
            $mediaGalery = MediaGalery::where('media_id',$value->id)->get()->first();

            $mediaGalery->delete();
            $value->delete();
        }

        $nameFolder = 'galery/'.$galery->slug.'-'.$galery->id.'/';

        $imagenes = static::getImages($request, $galery, $nameFolder);

        $videos = static::getVideos($request, $galery);

        return true;
    }

    protected static function getVideos($request, $galery) {

        if(isset($request->videos[0])) {
            foreach ($request->videos as $videoKey => $videoValue) {

                $saveVideo   = Media::saveVideo($videoKey, $videoValue);
                $mediaNotice = MediaGalery::saveData($saveVideo->id, $galery->id);
            }
        }

        return;
    }

    protected static function getImages($request, $galery, $nameFolder) {

        if(isset($request->img)) {
            foreach ($request->img as $imgKey => $imgValue) {
                $saveImage   = Media::saveImg($imgKey, $imgValue, $nameFolder);
                $mediaNotice = MediaGalery::saveData($saveImage->id, $galery->id);
            }
        }

        return;
    }
}
