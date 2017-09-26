<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaNotice extends Model
{
	protected $table = 'media_notices';
	protected $fillable = ['media_id', 'notice_id'];
}
