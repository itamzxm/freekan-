<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/9
 * Time: 1:43
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Common\WriteConfigController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    private $config;

    public function __construct()
    {
        $this->config = new WriteConfigController();
    }

    #登录页
    public function adminLogin()
    {
        return view('admin.adminlogin');
    }

    #登录判断
    public function loginCheck(Request $request)
    {
        $username = htmlspecialchars($request->post('username'));
        $passwd = htmlspecialchars($request->post('passwd'));
        if ($username == config('logininfo.username') && md5($passwd) == config('logininfo.passwd')) {
            $request->session()->put('is_login', 1);
            $request->session()->put('adminname', $username);
            $res = ['accessGranted' => 1];

        } else {
            $res = ['faild' => 1];
        }

        return json_encode($res);

    }

    #修改密码
    public function ChangeInfo()
    {
        return view('admin.adminlogininfo', ['webset' => config('webset')]);
    }

    #执行修改密码操作
    public function xgInfo(Request $request)
    {
        $newname = htmlspecialchars($request->post('newusername'));
        $newpasswd = htmlspecialchars($request->post('newpasswd'));
        $new = ['username' => $newname, 'passwd' => md5($newpasswd)];
        $path = CONFIG_PATH . 'logininfo.php';
        $msg = $this->config->writeConfig($new, $path);
        if ($msg == 'ok') {
            echo json_encode(['status' => 200, 'msg' => '修改成功']);
        } else {
            echo json_encode(['status' => 400, 'msg' => '修改失败']);
        }
    }

    //注销登录
    public function loginOut(Request $request)
    {
        //清空session
        $request->session()->forget('adminname');
        $request->session()->forget('is_login');
        return redirect('/'.(empty(config('webset.webdir')) ? 'admin' : config('webset.webdir')).'login');
    }

}