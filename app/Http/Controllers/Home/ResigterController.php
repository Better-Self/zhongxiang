<?php

namespace App\Http\Controllers\Home;
use App\Http\Requests\RegisterPost;
use App\Http\Controllers\Controller;
use App\Models\AljyzmUser;
use App\Models\CommonMember;
use App\Models\CommonMemberActionLog;
use App\Models\CommonMemberCount;
use App\Models\CommonMemberFieldForum;
use App\Models\CommonMemberFieldHome;
use App\Models\CommonMemberProfile;
use App\Models\CommonMemberStatus;
use App\Models\CommonMemberValidate;
use App\Models\CommonMemberVerify;
use App\Models\CommonMemberVerifyInfo;
use App\Models\UcMember;

class ResigterController extends Controller
{
    public function create()
    {
        return view('home.register.create');
    }

    public function store(RegisterPost $request)
    {
        $salt = substr(uniqid(rand()), -6);
        $password = $request->input('password');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $regip = $request->getClientIp();
        $time = time();
        $data = ['username' => $name,'email' => $email, 'salt' => $salt ,'password' => md5(md5($password).$salt),'regip'=>$regip,'regdate' => $time,'mobile' => $phone];
        $model = new UcMember();
        $uid = $model->add($data);
        if ($uid){
            //用户关联帖子表：//credits暂时写死，需要后台设计之后，调取配置信息
            $datas = array(
                'uid' => $uid,'username' => $name,'password' => md5(md5($password).$salt),'email' => $email,
                'adminid' => 0,'regdate' => $time,'credits' => 1, 'timeoffset' => 9999
            );
            $member = new CommonMember();
            $member->insert($datas);

            //用户审核相关表
            $verifyarr = array();
            $setverify = array('uid' => $uid,'username' => $name,'verifytype' => '0','field' => serialize($verifyarr),'dateline' => $time);
            $verifyInfo = new CommonMemberVerifyInfo();
            $verifyInfo->insert($setverify);

            $verify = new CommonMemberVerify();
            $verify->insert(array('uid' => $uid));


            //pre_common_member_validate 用户审核表
            $validateData =array('uid' => $uid,'submitdate' => $time,'moddate' => 0,'admin' => '','submittimes' => 1, 'status' => 0);
            $validate = new CommonMemberValidate();
            $validate->insert($validateData);

            //用户状态表 common_member_status
            $status = array(
                'uid' => $uid,'regip' => (string)$regip,'lastip' => (string)$regip,
                'lastvisit' => $time,'lastactivity' => $time,'lastpost' => 0,'lastsendmail' => 0
            );
            $memberStatus = new CommonMemberStatus();
            $memberStatus->insert($status);

            //用户数据统计表common_member_count
            $count = array(
                'uid' => $uid,'extcredits1' => 0,'extcredits2' => 0,'extcredits3' => 0,
                'extcredits4' => 0,'extcredits5' => 0,'extcredits6' => 0,'extcredits7' => 0,'extcredits8' => 0
            );
            $memberCount = new CommonMemberCount();
            $memberCount->insert($count);

            //pre_common_member_field_forum 用户论坛字段表
            $forum = new CommonMemberFieldForum();
            $forum->insert(array('uid' => $uid));

            //pre_common_member_field_home 用户家园字段表
            $home = new CommonMemberFieldHome();
            $home->insert(array('uid' => $uid));

            //pre_common_member_action_log 用户操作日志
            $log = new CommonMemberActionLog();
            $logData = array('uid' => $uid, 'action' => 'register', 'dateline' => $time);
            $log->insert($logData);

            //用户个人信息增加
            $profile = new CommonMemberProfile();
            $profile->insert(array('uid'=> $uid,'mobile' => $phone));


            $id = \Auth::guard()->attempt(
                [
                    'user_name'=> $name,
                    'password' => md5($password).$salt,
                ]
            );

            if ($id){
                return redirect('/admin/forum');
            } else {
                echo 'no';
            }
        }
    }
}
