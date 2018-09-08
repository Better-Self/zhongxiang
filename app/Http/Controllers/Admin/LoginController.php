<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use DB;

// 后台登录控制器
class LoginController extends Controller
{
   // 后台登录方法

    public function index(){
        
        return view('admin.login');
    }

    // 后台登录处理

    public function check(Request $request){
        
        // 接收数据

        $name=$request->input("name");
        $pass=md5($request->input("pass"));
        $code=$request->input("code");
      	
        // 判断用户名是否输入

        if ($name) {
            # code...
            // 判断密码
            if ($pass) {
                # code...
                // 验证码是否正确

                // // 引入验证码类
                include "../resources/code/Code.class.php";

                // // 实例化验证码类

                $code1=new \Code();

                // 获取验证码

                $yzm=$code1->get();

                if ($yzm==strtoupper($code)) {
                  	
                	     if (Auth::guard("admin")->attempt(array('name' => $name, 'password' => $pass)))
					    	{
					             	
					               return redirect('/admin');
					    	}else{
					    			
					    			return redirect('/admin/login');
					    	}

                }else{
                    return back()->withInput()->with("error","验证码有误");

                }

            }else{
                return back()->withInput()->with("error","请输入密码");

            }
        }else{
            return back()->withInput()->with("error","请输入用户名");
        }
     //    exit();
    	// // 判断

    	// if ($_POST['name']=='admin' && $_POST['pass']=='123') {
    		

    		
    	// }else{

    	// 	return back();
    	// }
    }

    // 验证码方法

    public function yzm(){
        // 引入验证码类
        include "../resources/code/Code.class.php";

        // 实例化验证码类

        $code=new \Code();

        // 生成验证码

        $code->make();
    }

    // 退出

    public function logout(){
          Auth::logout();
          return redirect('admin/login');
    }
}
