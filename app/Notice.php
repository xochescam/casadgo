<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
	protected $table = 'roles';
	protected $fillable = ['id', 'url', 'title', 'description', 'date', 'type'];
}
