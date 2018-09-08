<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table="role";
    protected $primaryKey="id";
    public  $timestamps =false;


    //当前角色所有权限
    public function permissions()
    {
        return $this->belongsToMany('App\AdminPermission','access','role_id','node_id')->withPivot(['node_id','role_id']);
    }
  
    //给角色赋予权限
    public function grantPermission($permission){
    	return $this->permissions()->save($permission);
    }
   
    //取消赋予的权限
    public function doletePermission($permission){
    	return $this->permissions()->detach($permission);

    }

    //用户是否有权限

    public function hasPermission($permission){
    		return $this->permissions()->contains($permission);
    }

     public function user()
     {
         return $this->belongsTo('App\Users', 'role_id');
     }
}
