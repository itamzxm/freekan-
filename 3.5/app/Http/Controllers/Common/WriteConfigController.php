<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/7
 * Time: 19:59
 */

namespace App\Http\Controllers\Common;


use App\Http\Controllers\Controller;

class WriteConfigController extends Controller
{
    #写入配置信息
    public function writeConfig($arr, $path)
    {
        ob_start();
        var_export($arr);
        $arrStr = ob_get_contents();
        ob_end_clean();
        $config = '<?php' . PHP_EOL
            . 'return ' . $arrStr . ';';
        if (file_exists($path)) {
            unlink($path);
        }
        $res = file_put_contents($path, $config);
        if ($res) {
            return 'ok';
        } else {
            return 'faild';
        }
    }

    #写入电影文本信息
    public function writeDyData($arr='',$id,$action=''){
        $path = DATA_PATH.'dydata.json';
        $data = file_get_contents($path);
        if($data!=''){
            $res = json_decode($data,true);
        }
        if($action=='delete'){
            unset($res[$id]);
        }
        else{
            $res[$id] = $arr;
        }

        $str = json_encode($res);
        if (file_exists($path)) {
            unlink($path);
        }
        $res = file_put_contents($path, $str);
        if ($res) {
            return 'ok';
        } else {
            return 'faild';
        }
    }

    #写入友情连接信息
    public function writeYqLink($arr='',$id,$action=''){
        $path = DATA_PATH.'yqlink.json';
        $data = file_get_contents($path);
        if($data!=''){
            $res = json_decode($data,true);
        }
        if($action=='delete'){
            unset($res[$id]);
        }
        else{
            $res[$id] = $arr;
        }

        $str = json_encode($res);
        if (file_exists($path)) {
            unlink($path);
        }
        $res = file_put_contents($path, $str);
        if ($res) {
            return 'ok';
        } else {
            return 'faild';
        }
    }

    #写入直播信息
    public function writeZb($arr='',$id,$action=''){
        $path = DATA_PATH.'zblist.json';
        $data = file_get_contents($path);
        if($data!=''){
            $res = json_decode($data,true);
        }
        if($action=='delete'){
            unset($res[$id]);
        }
        else{
            $res[$id] = $arr;
        }

        $str = json_encode($res);
        if (file_exists($path)) {
            unlink($path);
        }
        $res = file_put_contents($path, $str);
        if ($res) {
            return 'ok';
        } else {
            return 'faild';
        }
    }

    #写入数据信息
    public function writeData($arr='',$id,$action='',$dataname){
        $path = DATA_PATH.$dataname.'.json';
        $data = file_get_contents($path);
        if($data!=''){
            $res = json_decode($data,true);
        }
        if($action=='delete'){
            unset($res[$id]);
        }
        else{
            $res[$id] = $arr;
        }

        $str = json_encode($res);
        if (file_exists($path)) {
            unlink($path);
        }
        $res = file_put_contents($path, $str);
        if ($res) {
            return 'ok';
        } else {
            return 'faild';
        }
    }
}