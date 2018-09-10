<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\AdminRole;
use App\Http\Controllers\Controller;
use DB;

// 后台用户管理首页控制器
class UserController extends Controller
{
   // 后台用户管理首页方法

    public function index(){
        //$user = AdminUser::paginate(10);
        //return view('admin.user.index',compact('user'));
    	$tot=\DB::table("user")->count();

        $data=\DB::table("user")->orderBy("id","desc")->paginate(10);

            // simplePaginate  简化的分页效果
            // paginate  正常分页效果
        // 加载用户管理页面
        return view('admin.user.index')->with("data",$data)->with('tot',$tot);
    }

    // 后台用户管理修改页面
    public function edit($id){
    	 $data = \DB::table("user")->find($id);
      
    	return view('admin.user.edit')->with("data",$data);

    }

     // 修改密码展示页面
    public function show($id){
    	$data = \DB::table("user")->where('id',$id)->first();
		
    	
    	return view('admin.user.repass')->with("data",$data);

    }


    // 后台用户管理添加页面
    public function create(){
    	return view('admin.user.create');

    }

    // 添加操作
    public function store(Request $request){
    	
    	parse_str($_POST['str'],$arr);
    
        // 规则

        $rules=[
                'name'=>'required|unique:user|between:6,12',
                "pass"=>'required|between:6,12|same:repass',
            ];

        // 所有数据

        $input=$arr;


        // 修改提示信息

        $message=array(

            "name.required"=>"请输入用户名",
            "name.unique"=>"用户名已存在",
            "name.between"=>"长度不满足",
            "pass.required"=>"请输入密码",
            "pass.between"=>"密码长度不满足6-12位",
            "pass.same"=>"密码输入两次不一致",
            );

        // 设置表单验证的参数
            // 参数一 需要验证的数据
            // 参数二 验证规则
            // 参数三 提示信息
        $validator = \Validator::make($input,$rules,$message);

        
        // 进行验证
       
        if($validator->passes()){
            // 处理数据
           
            unset($arr['repass']);

            $arr['pass']=md5($arr['pass']);
            $arr['time']=time();

            if (\DB::table("user")->insert($arr)) {
              	 return 1;
            }else{
            	return 0;
            }

        }else{
        	return $validator->getMessageBag()->getMessages();
        }
        // else{
        //     return back()->withInput()->withErrors($validator);
        // }
   

    }


    // 修改操作
    public function update(Request $request){

    		parse_str($_POST['str'],$arr);
    		 // 规则

       

      		$id = $arr['id'];
       		

            if (\DB::table("user")->where("id",$id)->update($arr)) {
              	 return 1;
            }else{
            	return 0;
            }

        
    }


    // 删除操作
    public function destroy($id){
    	if(\DB::table("user")->delete($id)){
    		return "1";
    	}else{
    		return "0";
    	}
    }
    //修改用户启用状态
    public function ajaxUserStat(Request $request){
    	$arr = $request->except("_token");
    	$id = $arr['id'];
    	$statu = $arr['statu'];
    	
    	if($statu==1){
    		if(\DB::table("user")->where("id",$id)->update(["statu"=>$statu])){

	    		return "11";
	    	}else{
	    		return "00";
	    	}	
    	}else if($statu==0){
    		if(\DB::table("user")->where("id",$id)->update(["statu"=>$statu])){

	    		return "1";
	    	}else{
	    		return "0";
	    	}
    	}
    		
    	
    }

    //用户角色页面
    public function role(){
        $count = \DB::table("user")->count();
        $data = \DB::table("user")->join('roles','user.role_id','=','roles.id')
        		->select('user.*', 'roles.name as names')
        		->get();
       
        return view('admin.user.role')->with('data',$data)->with('count',$count);
    }

    public function storeRole($id){

        if(\DB::table("user")->delete($id)){
            return "1";
        }else{
            return "0";
        }

    }
}
