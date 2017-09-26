<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['id','permission','slug'];

    public function role(){
        return $this->belongsToMany('\App\Role', 'permission_roles');
    }
}
