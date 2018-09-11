<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pre_city extends Model
{
    protected $table="pre_city";
    protected $primaryKey="id";
    public  $timestamps =false;
    protected $guarded = [];
    //protected $fillable = ['name','url','type'];
}
