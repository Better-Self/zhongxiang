<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    protected $table="node";
    protected $primaryKey="id";
    public  $timestamps =false;


    //权限属于哪个角色
    public function roles()
    {
        return $this->belongsToMany('App\AdminRole','access','node_id','role_id')->withPivot(['node_id','role_id']);
    }
  
   
}
