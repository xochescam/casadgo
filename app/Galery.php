<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
	protected $table = 'roles';
	protected $fillable = ['id', 'name', 'url', 'description'];
}
