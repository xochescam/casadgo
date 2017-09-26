<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';
	protected $fillable = ['id', 'name'];

	public function permission()
    {
        return $this->belongsToMany('\App\Permission','permission_roles');
    }

    public function user()
    {
        return $this->belongsToMany('\App\User','role_users');
    }
}
