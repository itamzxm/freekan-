<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2018/1/11
 * Time: 14:38
 */

namespace App\Http\Controllers\Index;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;

class TestController extends Controller
{
    private $core;

    public function __construct()
    {
        $this->core = new CoreController();
    }

    public function test($key){
        $res = $this->core->getNews($key);
        print_r($res);
    }

}