<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\AdminRole;
use App\Http\Controllers\Controller;
use DB;

// 后台用户管理首页控制器
class UserListController extends Controller
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

    public function search(){
        return view("admin.userList.search");
    }
}
