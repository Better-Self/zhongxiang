<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Auth;


// 前台首页模块
class HomeController extends Controller
{
    // 前台首页方法

    public function Index()
{
 
    echo Auth::user()['email']."<hr/>";
 
    if($this->authorize('update')){
        echo "you can update!<br/>";
    }
 
    if($this->authorize('delete')){
        echo "you can delete!<br/>";
    }
 
    if($this->authorize('post')){
        echo "you can post!<br/>";
    }
}
}
