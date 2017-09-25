<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
	protected $table = 'notices';
	protected $fillable = ['id', 'title', 'description', 'date'];
}
