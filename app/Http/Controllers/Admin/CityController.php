<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pre_city;
use App\Http\Controllers\Controller;
use DB;


class CityController extends Controller
{


    public function index(Pre_city $city){

        $count =  $city->count();
        $data = $city->orderBy("id",'asc')->paginate(10);
        return view("admin.city.index",compact("data",'count'));
    }

    public function create(){
        return view("admin.city.create");
    }


    public function store(Request $request){

        $params = request(['province', 'city','district']);

        $result = Pre_city::create($params);
        if($result){
            return "1";
        }else{
            return "0";
        }


    }

    public function  destroy(){

        \DB::delete("delete from types where id=$id or path like '%,$id,%'");
    }






    public function data($data,$pid=0){

        $newArr=array();

        foreach ($data as $key => $value) {
            # code...
            if($value->pid==$pid){

                $newArr[$value->id]=$value;
                $newArr[$value->id]->zi=$this->data($data,$value->id);

            }
        }
        return $newArr;
    }
}
