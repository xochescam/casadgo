<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\MediaNotice;

class Media extends Model
{
	protected $table = 'media';
	protected $fillable = ['id', 'name', 'url', 'type'];

	public function galery()
    {
        return $this->hasOne('App\Galery');
    }

    public function notice(){
        return $this->belongsToMany('\App\Notice','media_notices');
    }

	public static function saveNoticeOrImage($request, $type, $noticeId){

		if($type == 'notices') {

                  $nameFolder = str_replace(" ","-", $request->title).'/';

			foreach ($request->img as $imgKey => $imgValue) {

				$saveImage = Media::saveImg($imgKey, $imgValue, $type, $nameFolder);

        		      $mediaNotice = MediaNotice::saveData($saveImage->id, $noticeId);
			}

                  foreach ($request->videos as $videoKey => $videoValue) {

                        $saveVideo = Media::saveVideo(1, $videoValue);

                        $mediaNotice = MediaNotice::saveData($saveVideo->id, $noticeId);
                  }


			return 'true';

		} else {

			$save = Media::saveImg(1, $request->img, $type, null);

			return $save;
		}
    }


      public static function saveVideo($key, $video) {

            $file = new Media;

            $file->name = $key;
            $file->url  = $video;
            $file->type = 'video';

            $file->save();

            return $file;
      }

      public static function saveImg($key, $img, $type, $nameFolder) {

		$file = new Media;

	      $file->name = $key;
            $file->url  = 'default';
	      $file->type = 'img';

	      $file->save();

		$now 		= Carbon::now()->toDateTimeString();
		$doblepoint = str_replace(":", "", $now);
		$middle     = str_replace("-", "", $doblepoint);
		$name       = str_replace(" ", "", $middle);

		if($img != null){
                  $originalNameImg = $img->getClientOriginalName();
                  $extFiles 	     =  strtolower(pathinfo($originalNameImg, PATHINFO_EXTENSION));
                  $newNameFiles    = $name."_".$file->id.".".$extFiles;
                  $route           = $type == 'galery' ?
                                          $type.'/'.$newNameFiles :
                                          $type.'/'.$nameFolder.$newNameFiles;

                  \Storage::disk('local')->put($route,  \File::get($img));
	      }

            $file->url  = 'storage/'.$route;
		$file->name = $newNameFiles;
		$file->save();

		return $file;
    }
}
