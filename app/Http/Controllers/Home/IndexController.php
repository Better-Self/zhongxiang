<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



// 前台首页模块
class IndexController extends Controller
{
    // 前台首页方法

    public function index(){
        echo "前台首页";
        echo \Crypt::decrypt('eyJpdiI6InIwOXRBSFVPM3lBWFBcL1J5S1wvSUZldz09IiwidmFsdWUiOiJcL01Pd2RVall6d2w1aTBHaWg1SDhHQT09IiwibWFjIjoiNjkwNDg5YjlhYjk2Njc3YWNmNDQ3NTczNzQ0N2Y5NjFkMGQ3NWJiOWNhYWU1YTg2ODc2NjAwZDliNTQ1NWVjNiJ9
');
    }
}
