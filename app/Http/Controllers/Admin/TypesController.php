<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Models\Pre_forum_forum;


class TypesController extends Controller
{


    public function index(){
        $count =   Pre_forum_forum::count();
        $column =  Pre_forum_forum::get();
        $data = $this->data($column);

        return view("admin.types.index",compact('data','count'));
    }

    public function create(Pre_forum_forum $forum){
        $fid =  request('fid');
        $forums = $forum->where("fid",$fid)->get();

    	return view("admin.types.create",compact("forums"));
    }


    public function store(Request $request){

    	parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        $arr['fup']=$arr['fid'];
        unset($arr['fid']);
        if($arr['type']=="group"){

            $arr['type']="forum";
            if (Pre_forum_forum::insert($arr)) {
                return 1;
            }else{
                return 0;
            }


        }
        if($arr['type']=="forum"){


            $arr['type']="sub";
            if (Pre_forum_forum::insert($arr)) {
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function  destroy($id){

        if(Pre_forum_forum::where('fid','=',$id)->delete()){
            return "1";
        }else{
            return "0";
        }
    }



    public function  show(Pre_forum_forum $forum){
        $collection  = $forum::get()->groupBy('type');
        $group = $collection['group']->pluck('name','fid')->all();
        $forums = $collection['forum']->pluck('name','fid')->all();

        return view("admin.types.show",compact("forums","group"));
    }

    public function forumStore(){
        parse_str($_POST['str'],$arr);
        $arr['type']="group";
        if (Pre_forum_forum::insert($arr)) {
            return 1;
        }else{
            return 0;
        }
    }

    public function edit($id){
        $forums = Pre_forum_forum::find($id);

        return view("admin.types.edit",compact("forums"));
    }
    public function update(Pre_forum_forum $forum){
        parse_str($_POST['str'],$arr);

        $name=$arr['name'];
        $status = $arr['status'];

        if($forum->where("fid",$arr['fid'])->update(['name'=>$name, 'status'=>$status])){
            return "1";
        }else{
            return "0";
        }
    }
    public function data($data,$pid=0){

    	$newArr=array();

    	foreach ($data as $key => $value) {
    		# code...
    		if($value->fup==$pid){

    			$newArr[$value->fid]=$value;
    			$newArr[$value->fid]->zi=$this->data($data,$value->fid);

    		}
    	}
    	return $newArr;
    }
}
