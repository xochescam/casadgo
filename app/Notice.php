<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;
use Auth;

class Notice extends Model
{
	protected $table = 'notices';
	protected $fillable = ['id', 'slug', 'title', 'description', 'date', 'user_id'];

    public function media(){
        return $this->belongsToMany('\App\Media','media_notices');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

	public static function saveData($request){

        $slug = str_replace(" ","-",strtolower($request->title));

		$noticeData = new Notice;

        $noticeData->slug        = $slug;
        $noticeData->title       = $request->title;
        $noticeData->description = $request->description;
        $noticeData->date        = $request->date;
        $noticeData->user_id     = Auth::User()->id;
        $noticeData->save();


        $nameFolder = 'notices/'.$slug.'-'.$noticeData->id.'/';

        if(isset($request->img)) {
            foreach ($request->img as $imgKey => $imgValue) {
                $saveImage   = Media::saveImg($imgKey, $imgValue, $nameFolder);
                $mediaNotice = MediaNotice::saveData($saveImage->id, $noticeData->id);
            }
        } 

        if(isset($request->videos[0])) {
            foreach ($request->videos as $videoKey => $videoValue) {

                $saveVideo   = Media::saveVideo($videoKey, $videoValue);
                $mediaNotice = MediaNotice::saveData($saveVideo->id, $noticeData->id);
            }
        }

        return 'true';
    }
}
