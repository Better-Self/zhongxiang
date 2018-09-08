<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 后台管理控制器
class SysController extends Controller
{
   

    public function index(){


       return view("admin.sys.config.index");
    }

    public function create(){
    	return view("admin.types.create");
    }


    public function store(Request $request){


    	parse_str($_POST['str'],$arr);
    	
    	unset($arr['_token']);
    	$oldImg = $arr['oldImg'];
    	$img = $arr['img'];
    	if($oldImg ==$img ){

    	}else{
    		unlink("./Uploads/sys/".$oldImg);
    	}
    	unset($arr['oldImg']);

    	$str1 = var_export($arr,true);	
    	$str = "<?php return ".$str1." ?>";
    	file_put_contents('../config/web.php', $str);
    	return 1;
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
