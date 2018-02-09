<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;
use App\MediaNotice;
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
 
        $imagenes = static::getImages($request, $noticeData, $nameFolder);

        $videos = static::getVideos($request, $noticeData);


        return true;
    }

    public static function updateData($request, $id) {

        $notice = Notice::findOrFail($id);
        $media = $notice->media()->where('type','video')->get();

        $notice->title       = $request->title;
        $notice->description = $request->description;
        $notice->date        = $request->date;
        $notice->save();

        foreach ($media as $key => $value) {
            $mediaNotice = MediaNotice::where('media_id',$value->id)->get()->first();

            $mediaNotice->delete();
            $value->delete();
        }

        $nameFolder = 'notices/'.$notice->slug.'-'.$notice->id.'/';

        $imagenes = static::getImages($request, $notice, $nameFolder);

        $videos = static::getVideos($request, $notice);

        return true;
    }

    protected static function getVideos($request, $notice) {

        if(isset($request->videos[0])) {
            foreach ($request->videos as $videoKey => $videoValue) {

                $saveVideo   = Media::saveVideo($videoKey, $videoValue);
                $mediaNotice = MediaNotice::saveData($saveVideo->id, $notice->id);
            }
        }

        return;
    }

    protected static function getImages($request, $notice, $nameFolder) {

        if(isset($request->img)) {
            foreach ($request->img as $imgKey => $imgValue) {
                $saveImage   = Media::saveImg($imgKey, $imgValue, $nameFolder);
                $mediaNotice = MediaNotice::saveData($saveImage->id, $notice->id);
            }
        }

        return;
    }
}
