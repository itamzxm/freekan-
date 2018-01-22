<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Index\IndexController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{


    public function curl_get_qq($url)
    {

        $testurl = $url;
        $referer = 'http://v.qq.com';
        $conputer_user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
        $mobile_user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4";
        $cookie = 'tvfe_boss_uuid=c8bf3ffcf349943b; pgv_pvi=1800178688; _video_qq_version=1.1; _video_qq_main_login=wx; main_login=wx; uid=531764133; pac_uid=0_37ec32f380536; _video_qq_access_token=Dv81vD0TkIEcAavv7g-H7hki1kueikfVfxJRvraDVwoAS6RRemsDr35fgeOnbBJQ5wfdCr8uFt0SPSIfW7becg; _video_qq_appid=wx5ed58254bc0d6b7f; _video_qq_openid=ox8XOvhSZ4brtdqmZ-4MA2BdG5hQ; _video_qq_vuserid=503932111; _video_qq_vusession=f94cc73371c6df75578420911efc; _video_qq_refresh_token=enziNco_2xDOHD4e_T3yDDCp07i2JbGoOd2a2AP25XXk5ngkuK7-cL7ADU5rSsM8kRNfqyux0owWX0l9uP1vjg; _video_qq_next_refresh_time=6600; access_token=Dv81vD0TkIEcAavv7g-H7hki1kueikfVfxJRvraDVwoAS6RRemsDr35fgeOnbBJQ5wfdCr8uFt0SPSIfW7becg; appid=wx5ed58254bc0d6b7f; openid=ox8XOvhSZ4brtdqmZ-4MA2BdG5hQ; vuserid=503932111; vusession=f94cc73371c6df75578420911efc; refresh_token=enziNco_2xDOHD4e_T3yDDCp07i2JbGoOd2a2AP25XXk5ngkuK7-cL7ADU5rSsM8kRNfqyux0owWX0l9uP1vjg; next_refresh_time=6600; login_time_last=2017-11-13 15:43:25; pgv_info=ssid=s6912158864; pgv_pvid=1430175312';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $testurl);
        //参数为1表示传输数据，为0表示直接输出显示。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $conputer_user_agent);
        //参数为0表示不带头文件，为1表示带头文件
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function curl_get($url)
    {

        $testurl = $url;
        $referer = 'http://www.360kan.com';
        $conputer_user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
        $mobile_user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $testurl);
        //参数为1表示传输数据，为0表示直接输出显示。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $conputer_user_agent);
        //参数为0表示不带头文件，为1表示带头文件
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /*
     * url:访问路径
     * array:要传递的数组
     * */
    public function curl_post($url, $array)
    {
        $curl = curl_init();
        $user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";
        $mobile_user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4";
        $referer = "http://www.rartxt.com";
        $cookies = 'csrftoken=NK9zWiHi1QGpvvSYDk9zEmFNXfJ77bj77ZmTaEla5JgHDe1Cgw2UJNHvs6qIvaJa; sessionid=z8nncax7og8b3x74fw8nt2svp6l89pqa';
        //设置提交的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
        //curl_setopt($curl,CURLOPT_REFERER,$referer);
        //curl_setopt($curl, CURLOPT_COOKIE, $cookies);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        $post_data = $array;
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //获得数据并返回
        return $data;
    }

    public function curl_get_dwz($url)
    {

        $testurl = $url;
        $conputer_user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
        $mobile_user_agent = "Mozilla/5.0 (iPhone; CPU iPhone OS 8_0 like Mac OS X) AppleWebKit/600.1.3 (KHTML, like Gecko) Version/8.0 Mobile/12A4345d Safari/600.1.4";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $testurl);
        //参数为1表示传输数据，为0表示直接输出显示。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $conputer_user_agent);
        //参数为0表示不带头文件，为1表示带头文件
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    #读取数据
    public function readData($path)
    {
        $str = file_get_contents(DATA_PATH . $path . '.json');
        $list = json_decode($str, true);
        return $list;
    }

    #刷新缓存
    public function flushIndex($action = '')
    {
        $page = new IndexController();
        if ($action == 'index') {
            $page->index('flush');
            return true;
        }

    }

    #历史记录
    public function saveHistory(Request $request)
    {
        $url = strip_tags($request->get('url'));
        $img = strip_tags($request->get('img'));
        $title = strip_tags($request->get('title'));
        $arry = ['url' => $url, 'img' => $img, 'title' => $title];
        if ($request->hasCookie('history')) {
            $old = $request->cookie('history');
            if (!in_array($arry, $old)) {
                if (count($old) >= 7) {
                    array_shift($old);
                }
                $old[] = $arry;
                Cookie::queue('history', $old, 60 * 24 * 7);
            }

        } else {
            $new[] = $arry;
            Cookie::queue('history', $new, 60 * 24 * 7);
        }

    }

    #搜索尝鲜
    public function seacherCx($name)
    {
        $cxs = [];
        $data = $this->readData('dydata');
        foreach ($data as $key => $v) {
            if (strpos($v['dyname'], $name) !== false) {
                $cxs[$key] = $data[$key];
            }
        }

        return $cxs;
    }

    #过滤侵权视频
    public function filterQq($play)
    {
        $has = 0;
        $url = 'http://' . config('webset.webdomin') . '/play/' . $play . '.html';
        $qqlist = $this->readData('qqlist');
        foreach ($qqlist as $v) {
            if ($v['qqlink'] == $url) {
                $has = 1;
            }
        }

        return $has;
    }

    #获取模板文件名
    public function getTemDir()
    {
        $dirname = [];
        $dir = opendir(TEMPLATE_PATH);
        if ($dir) {
            while ($f = readdir($dir)) {
                if ($f == "." || $f == "..") {
                    continue;//跳出本次循环，继续下一次遍历。
                }
                if (is_dir(TEMPLATE_PATH . $f)) {
                    $dirname[] = $f;
                }
            }
        }
        return $dirname;

    }

    #获取尝鲜剧集
    public function getJs($addr)
    {
        $addr = trim($addr);
        $arr = explode("\r\n", $addr);
        $js = [];
        foreach ($arr as $v) {
            trim($v);
            $arr2 = explode("$", $v);
            $fj['name'] = $arr2[0];
            $fj['url'] = $arr2[1];
            $js[] = $fj;
        }

        return $js;
    }

    #导航排序
    public function navSort()
    {
        $arr = $this->readData('navlist');
        foreach ($arr as $key => $v) {
            $num[$key] = $v['navsort'];
        }

        array_multisort($num, SORT_DESC, $arr);
        return $arr;
    }

    #cc防御配置
    public function ccDefense(Request $request)
    {
        $cc_max_nums = config('ccset.cc_max_times');                    //次，刷新次数
        $cc_url_time = config('ccset.cc_url_time');//秒，延迟时间
        $admin_ip = config('ccset.cc_admin_ip');
        //$cc_log = 'cc_log.txt';                //启用本行为记录日志
        $cc_forward = 'http://127.0.0.1';    //释放到URL

        #获取访问url
        $url = $request->getRequestUri();
        #获取真实ip
        $request->setTrustedProxies(array('10.32.0.1/16'));
        $ip = $request->getClientIp();


        #判断逻辑
        if(in_array($ip,$admin_ip)){
            return true;
         }
        $timestamp = time();
        $cc_nowtime = $timestamp;
        if ($request->session()->has('cc_lasttime')) {
            $cc_times = ($request->session()->get('cc_times')) + 1;
            $request->session()->put('cc_times', $cc_times);
        } else {
            $cc_lasttime = $cc_nowtime;
            $cc_times = 1;
            $request->session()->put('cc_times', $cc_times);
            $request->session()->put('cc_lasttime', $cc_lasttime);
        }

        #释放ip
        if (($cc_nowtime - $cc_lasttime) <= 0) {
            if ($cc_times >= $cc_max_nums) {
                echo "请不要重复刷新!<script>setTimeout(function() {window.location.href = $url},".$cc_url_time.")</script>";
                exit;
 }
        } else {
            $cc_times = 0;
            $request->session()->put('cc_lasttime', $cc_lasttime);
            $request->session()->put('cc_times', $cc_times);
        }

    }
}