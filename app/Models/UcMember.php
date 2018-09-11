<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UcMember extends Model
{
    protected $table="uc_members";

    public function add($data){
        $status = DB::table($this->table)->insertGetId($data);
        return $status;
    }
}
