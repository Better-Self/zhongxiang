<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table="user";
    protected $primaryKey="id";
    public  $timestamps =false;

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Roles','role_user','user_id','role_id');
    // }
    public function Userinfo()
    {
        /*
         * @param [string] [name] [需要关联的模型类名]
         * @param [string] [foreign] [参数一指定数据表中的字段]
         * */
        return $this->hasOne('App\AdminRole','role_id');
        
    }
}
