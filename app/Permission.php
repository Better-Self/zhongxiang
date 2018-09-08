<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table="permissions";
    protected $primaryKey="id";
    public  $timestamps =false;
    public function Role()
    {
        return $this->belongsToMany('\App\Role','roles_permissions','permission_id','role_id');
    }
}
