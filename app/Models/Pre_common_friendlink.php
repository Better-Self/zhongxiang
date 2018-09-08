<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pre_common_friendlink extends Model
{
    protected $table="pre_common_friendlink";
    protected $primaryKey="id";
    public  $timestamps =false;
    //protected $guarded = [];
    protected $fillable = ['name','url','type'];
}
