<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles()
    {
        return $this->belongsToMany('\App\Role','role_users');
    }


    public function notice()
    {
        return $this->belongsTo('App\Notice');
    }

    /*
    |--------------------------------------------------------------------------
    | ACL
    |--------------------------------------------------------------------------
    */


    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     * @return boolean
     */
    public function hasPermission(Permission $permission)
    {
        return $this->hasRole($permission->role);
    }



   /**
     * Determine if the user has the given role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {

        if (is_string($role)) {

            return $this->roles->contains('slug', $role);

        }
            // if(!! $role->intersect($this->roles)->count()){
            //     dd($role->toArray());
            // }

        return !! $role->intersect($this->roles)->count();
    }


    /**
     * Determine if logged user has "superadmin" role.
     *
     * @return boolean
     */
    public function isSuperAdmin() {

        return $this->hasRole('admin');
    }
}
