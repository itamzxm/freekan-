<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/15
 * Time: 17:40
 */

namespace App\Http\Controllers\Common;


use App\Http\Controllers\Controller;

class SystemCotroller extends Controller
{
    #获取真实内存占用
    public function getMem()
    {
        $memory = (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage() / 1024 / 1024, 2);
        return $memory;
    }

    #获取服务器信息
    public function getServerInfo()
    {
        //获取服务器操作系统
        $info = [];
        $os = explode(" ", php_uname());
        $info['os'] = $os[0];
        //获取内核版本
        if ('/' == DIRECTORY_SEPARATOR) {
            $info['core'] = $os[2];
        } else {
            $info['core'] = $os[1];
        }
        //获取服务器解释引擎
        $info['jsyq'] = $_SERVER['SERVER_SOFTWARE'];
        //获取服务器端口
        $info['port'] = $_SERVER['SERVER_PORT'];
        //获取程序绝对路径
        $info['dir'] = $_SERVER['DOCUMENT_ROOT'] ? str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']) : str_replace('\\', '/', dirname(__FILE__));
        return $info;
    }

}