<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;

class Notice extends Model
{
	protected $table = 'notices';
	protected $fillable = ['id', 'title', 'description', 'date'];

	public static function saveData($request){

		$noticeData = new Notice;

        $noticeData->title       = $request->title;
        $noticeData->description = $request->description;
        $noticeData->date        = $request->date;
        $noticeData->save();

        $files = Media::saveNoticeOrImage($request, 'notices', $noticeData->id);

        return $files;
    }
}
