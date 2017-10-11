<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\MediaNotice;

use Image;

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

      $nameFolder = 'notices/'.str_replace(" ","-", $request->title).'/';

			foreach ($request->img as $imgKey => $imgValue) {

        $saveImage   = Media::saveImg($imgKey, $imgValue, $nameFolder);
        $mediaNotice = MediaNotice::saveData($saveImage->id, $noticeId);
			}

      foreach ($request->videos as $videoKey => $videoValue) {

          $saveVideo   = Media::saveVideo($videoKey, $videoValue);
          $mediaNotice = MediaNotice::saveData($saveVideo->id, $noticeId);
      }

			return 'true';

		} else {

			$save = Media::saveImg(1, $request->img, 'galeries/');

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

  public static function saveImg($key, $img, $nameFolder) {

    $file       = new Media;
    $file->name = $key;
    $file->url  = 'default';
    $file->type = 'img';
    $file->save();

    $now        = Carbon::now()->toDateTimeString();
    $doblepoint = str_replace(":", "", $now);
    $middle     = str_replace("-", "", $doblepoint);
    $name       = str_replace(" ", "", $middle);

		if($img != null) {

      $imgName     = $img->getClientOriginalName();
      $extImg      =  strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
      $newImgName  = $name."_".$file->id.".".$extImg;
      $route       = 'storage/'.$nameFolder;
      $thumbsRoute = $route.'/thumbs/';

      \Storage::disk('local')->put($nameFolder.$newImgName,  \File::get($img));

      if (!file_exists($thumbsRoute)) {
        mkdir($thumbsRoute, 0777, true);
      }

      $image = Image::make($route.$newImgName);
      $image->crop(100, 100);
      $image->save($thumbsRoute.$newImgName);
	  }

    $file->url  = $route;
		$file->name = $newImgName;
		$file->save();

		return $file;
  }
}
