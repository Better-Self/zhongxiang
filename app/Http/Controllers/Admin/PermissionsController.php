<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;


class PermissionsController extends Controller
{
   

    public function index(){
        $count = \DB::table("permissions")->count();
        $data = \DB::table("permissions")->orderBy("sort")->get()->toArray();
        //$data= $this->data($data);
       
        return view('admin.permissions.index')->with("data",$data)->with('count',$count);
    }

    public function create(){
        $data = \DB::table("permissions")->where('level','!=','3')->get();

        return view('admin.permissions.create')->with("data",$data);
    }


    public function store(Request $request){
        parse_str($_POST['str'],$arr);
        unset($arr['_token']);

        if (\DB::table("permissions")->insert($arr)) {
            return 1;
        }else{
            return 0;
        }

    }

    public function  destroy($id){
        if(\DB::table("permissions")->delete($id)){
            return "1";
        }else{
            return "0";
        }
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
