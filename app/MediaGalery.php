<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGalery extends Model
{
	protected $table = 'media_galeries';
	protected $fillable = ['id','media_id', 'galery_id'];
}
