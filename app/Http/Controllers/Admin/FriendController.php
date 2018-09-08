<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pre_common_friendlink;
class FriendController extends Controller
{
    

    public function index(Pre_common_friendlink $friend){
        $count =  $friend->count();
    	$friend = $friend->orderBy("id",'desc')->paginate(10);
    	return view("admin.friend.index",compact("friend",'count'));
    }

    public function  create(){
        return view("admin.friend.create");
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|min:2',
            'url' => 'required|url',
        ]);
        $params = request(['name', 'url','type']);
        $result = Pre_common_friendlink::create($params);
        return redirect('/admin/friend');
    }

    public function edit(Pre_common_friendlink $friend){
        return view("admin.friend.edit",compact("friend"));
    }

    public function  show(Pre_common_friendlink $friend){
          return view("admin.friend.show",compact("friend"));
    }

    public function update(Request $request,Pre_common_friendlink $friend){
        $this->validate($request, [
            'name' => 'required|max:255|min:2',
            'url' => 'required|url',
        ]);

        $friend->update(request(['name', 'url','type']));
        return redirect("/admin/friend");

    }

    public function destroy(Pre_common_friendlink $friend){
        if($friend->delete()){
            return "1";
        }else{
            return "0";
        }

    }
}
