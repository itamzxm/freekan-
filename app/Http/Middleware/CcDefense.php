<?php

namespace App\Http\Middleware;

use Closure;

class CcDefense
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!config('ccset.is_cc')){
            return $next($request);
        }
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
            return $next($request);
        }
        $timestamp = time();
        $cc_nowtime = $timestamp;
        if ($request->session()->has('cc_lasttime')) {
            $cc_lasttime = $request->session()->get('cc_lasttime');
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
        return $next($request);
    }
}
