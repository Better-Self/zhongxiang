<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table="roles";
    protected $primaryKey="id";
    public  $timestamps =false;
    public function Permission()
    {
        return $this->belongsToMany('App\Permission','roles_permissions','role_id','permission_id');
    }
}
