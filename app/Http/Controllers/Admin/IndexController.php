<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth; 
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\AdminPermission;

// 后台首页控制器
class IndexController extends Controller
{
   // 后台首页方法

    public function index(){

        $permission = \DB::table("permissions")->get()->toArray();
        foreach ($permission as $value){
            $data[]= $value->name;

        }
        //echo '<pre>';var_dump($data);
        // 引入页面
    	//文章权限控制
    	//echo encrypt('123456');exit;
    	//$params= array_merge(request(['title'],'content'),compact('user_id'));
       

	    //echo Auth::user()."<hr/>";
 
		    // if($this->authorize('userList')){
		    //     echo "you can userList!<br/>";
		    // }
		 
		 //    if($this->authorize('AdminManger')){
		 //        echo "you can AdminManger!<br/>";
		 //    }
		 
		 //    if($this->authorize('articleModel')){
		 //        echo "you can articleModel!<br/>";
		 //    }
//		     if($this->authorize('contentManger')){
//		         echo "you can userManger!<br/>";
//		     }
//
//	        exit;
	 	
	 	//exit;
	 
	   
       
        return view('admin.index')->with('data',$data);
    }

    public function delDir($path){

    	$arr = scandir($path);
    	foreach ($arr as $key => $value) {
    		# code...
    		# 
    		if($value != '.' && $value !='..'){
    			unlink($path.'/'.$value);
    		}
    	}

    }

    public function flush(){

    	$this->delDir("../storage/framework/views");
    	$this->delDir("../storage/framework/cache");


    	return redirect('admin');
    	
    	

    }

}
