<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\AdminPermission;
use Auth;
class RoleController extends Controller
{
   

    public function index(AdminPermission $user){
        $count = \DB::table("roles")->count();
    	 //$user->get()->toArray();
    	//$arr =$user->roles();
    	
    	//var_dump(Auth::user()->id);exit;
    	
    	// var_dump($permission->roles->toArray());exit;
    	
    	//$myRoles = $user->roles;
    	//return view('admin.role.index')->with(compact('roles','myRoles','user'));
        $data = \DB::table("roles")->get()->toArray();

        return view('admin.role.index')->with('data',$data)->with('count',$count);
    }

    public function create(){

        return view('admin.role.create');
    }
    public function show(){
        $data=\DB::table("roles")->get();

        return view('admin.role.show')->with('data',$data);
    }


    public function update(Request $request){


    	//$this->validate(request(),[

    		//'roles'=>'required|array'
    	//])

    	//$roles=\APP\Role::findmany(request('roles'));
    	//$myRole=$user->roles;
    	//$addRoles=$roles->diff($myRoles);
    	//foreach(add$roles as $role){
    	//$user->assignRole($role);
   		// }

        parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        $arrs = ['name'=>$arr['name'],'pass'=>md5($arr['pass']),'time'=>time()];
        $rid = $arr['role_id'];
        $insertId = \DB::table("user")->insertGetId($arrs);

        if ($rid) {
            \DB::table("role_user")->insert(['role_id'=>$rid,
                'user_id'=>$insertId,

                ]);
            return 1;
        }else{
            return 0;
        }
    }

    public function store(Request $request){

        parse_str($_POST['str'],$arr);
        unset($arr['_token']);

        if (\DB::table("roles")->insert($arr)) {
            return 1;
        }else{
            return 0;
        }
    

    }


    public function permission(){

    }

    public function storePermission(){

    }

    public function rolelist($id){
        $arr = \DB::table("roles")->find($id);


        $data = \DB::table("permissions")->get()->toArray();
        //$data= $this->data($data);
        $node=array();
        
        foreach ($data as $value){

            //$count=\DB::table("access")->where(['role_id']=>$id,'node_id'=>$value['id'])->count();
            $count = \DB::table("roles_permissions")->where("role_id", '=', $id)->where("permission_id", '=',       $value->id)->count();
           
            if($count){
                $value->access=1;
            }else{
                $value->access=0;
            }

            $node[]=$value;

        }	
        return view('admin.role.rolelist')->with('rolename',$arr)->with('data',$node)->with('rid',$id);
    }

    public function storeRolelist(){



    	parse_str($_POST['str'],$arr);
        unset($arr['_token']);

        $id = $arr['rid'];
        
        //删除用户所有权限
        $dl = \DB::table("roles_permissions")->where('role_id',$id)->delete();
       
        $data=array();

        foreach ($arr['access'] as $value) {
        	$tmp=explode('_', $value);
        	$data[]=array(

        		'role_id'=>$id,
        		'permission_id'=>$tmp[0],
        		'level'=>$tmp[1]
 
        	);
  		 }
  		 
        if (\DB::table("roles_permissions")->insert($data)) {
            return 1;
	        }else{
	        return 0;
	    }
        

	   

    }

    public function destroy($id){

        if(\DB::table("roles")->delete($id)){
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
