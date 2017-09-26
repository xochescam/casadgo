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

	public static function saveNoticeOrImage($request, $type, $noticeId){

		if($type == 'notices') {

			foreach ($request->img as $fileKey => $fileValue) {

				$save = Media::saveFile($fileKey, $fileValue, $type);

        		$mediaNotice = MediaNotice::saveData($save->id, $noticeId);
			}

			return 'true';

		} else {

			$save = Media::saveFile(1, $request->img, $type);

			return $save;
		}
    }


    public static function saveFile($key, $img, $type) {

			$typeMedia = explode("/", $img->getClientMimeType());

			if($typeMedia[0] == 'image') {

				$typeFile = 'img';

			} else {

				$typeFile = 'video';
			}


			$file = new Media;

	        $file->name = $key;
	        $file->url  = '/'.$type.'/';
	        $file->type = $typeFile;
	        $file->save();


			$now 		= Carbon::now()->toDateTimeString();
			$doblepoint = str_replace(":", "", $now);
			$middle     = str_replace("-", "", $doblepoint);
			$name       = str_replace(" ", "", $middle);

			if($img != null){
	            $originalNameFiles = $img->getClientOriginalName();
	            $extFiles 		   =  strtolower(pathinfo($originalNameFiles, PATHINFO_EXTENSION));
	            $newNameFiles 	   = $name."_".$file->id.".".$extFiles;

	            \Storage::disk('local')->put($type."/".$newNameFiles,  \File::get($img));
	        }

			$file->name = $newNameFiles;
			$file->save();

			return $file;
    }
}
