<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_roles';
    protected $fillable = ['id','permission_id','role_id'];
}
