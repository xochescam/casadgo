<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\MediaNotice;

use Image;

class Media extends Model
{
	protected $table = 'media';
	protected $fillable = ['id', 'url', 'name', 'type'];

    public function galery(){
      return $this->belongsToMany('\App\Galery','media_galeries');
    }

    public function notice(){
      return $this->belongsToMany('\App\Notice','media_notices');
    }

  public static function saveVideo($key, $video) {

    $file = new Media;

    $file->url  = $video;
    $file->name  = $key;
    $file->type = 'video';

    $file->save();

    return $file;
  }

  public static function saveImg($key, $img, $nameFolder) {

    $file       = new Media;
    $file->url  = 'default';
    $file->name  = $key;
    $file->type = 'img';
    $file->save();

    $now        = Carbon::now()->toDateTimeString();
    $doblepoint = str_replace(":", "", $now);
    $middle     = str_replace("-", "", $doblepoint);
    $name       = str_replace(" ", "", $middle);

		if($img != null) {

      $imgName     = $img->getClientOriginalName();
      $extImg      = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
      $newImgName  = $name."-".$file->id.".".$extImg;
      $route       = 'storage/'.$nameFolder;

      \Storage::disk('local')->put($nameFolder.$newImgName,  \File::get($img));

      $image = Image::make($route.$newImgName);

      $image->resize(900, null, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
      });
      $image->save($route.$newImgName);

      $image->fit(100);
      $image->save($route.'thumb-'.$newImgName);
	  }

    $file->url  = $route;
		$file->name = $newImgName;
		$file->save();

		return $file;
  }
}
