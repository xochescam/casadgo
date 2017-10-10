<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaNotice extends Model
{
	protected $table = 'media_notices';
	protected $fillable = ['media_id', 'notice_id'];

	public static function saveData($fileId, $noticeId){

            $mediaNotice = new MediaNotice;

            $mediaNotice->media_id  = $fileId;
            $mediaNotice->notice_id = $noticeId;

            $mediaNotice->save();
    }
}
