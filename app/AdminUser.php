<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table="user";
    protected $primaryKey="id";
    public  $timestamps =false;

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    // }
    public function roles(){
    	return $this->belongsToMany('App\AdminRole','role_user','user_id','role_id')->withPivot(['user_id','role_id']);
    }

    public function isInRoles($roles){
    	return !!$roles->intersect($this->roles)->count();
    }
    public function assignRole($role){
    	return $this->roles()->save($role);
    }

    public function doleteRole($role){
    	return $this->roles()->detach($role);

    }

    //用户是否有权限

    public function hasPermission($permission){
    	return $this->isInRoles($permission->roles);
    }
}
