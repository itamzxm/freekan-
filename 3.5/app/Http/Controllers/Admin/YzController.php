<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/13
 * Time: 11:25
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
error_reporting(0);
class YzController extends Controller
{
    private $wx;
    public function __construct()
    {
        $this->wx = new WeiXinController();
    }

    #对接微信
    public function Index(Request $request)
    {
        $echostr = $request->get('echostr');
        if($echostr && $this->checkSignature($request)){
            ob_clean();
            echo $echostr;
            exit();
        }
        else{
            $this->wx->responseMsg();//消息接口
        }

    }

    #微信对接方法
    private function checkSignature(Request $request)
    {
        $signature = $request->get('signature','');
        $timestamp = $request->get('timestamp','');
        $nonce = $request->get('nonce','');
        $token = config('wxconfig.token');
        $tmpArr = array($timestamp, $nonce,$token);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr==$signature) {
            return true;
        } else {
            return false;
        }
    }
}