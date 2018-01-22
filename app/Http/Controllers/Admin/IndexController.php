<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Common\SystemCotroller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;
use core\libs\view;

class IndexController extends Controller
{

    private $core;
    private $webset;
    private $system;
    private $common;

    #初始化采集核心
    public function __construct()
    {
        $this->core = new CoreController();
        #初始化系统参数
        $this->system = new SystemCotroller();
        #初始化公共控制器
        $this->common = new CommonController();

    }

    #生成后台首页
    public function index()
    {
        $total = $this->core->getTotal();
        $cxnum = count($this->common->readData('dydata'));
        $used_mem = $this->system->getMem();
        $info = $this->system->getServerInfo();
        return view('admin.index', ['total' => $total[0]['total'] + $cxnum, 'used_mem' => $used_mem, 'info' => $info, 'webset' => $this->webset]);
    }

    #生成后台网站设置界面
    public function webSet()
    {
        $webset = config('webset');
        $templates = $this->common->getTemDir();
        return view('admin.adminset', ['webset' => $webset, 'templates' => $templates]);
    }

    #生成后台接口界面
    public function jkSet()
    {
        $jkset = config('jkset');
        return view('admin.jiekou', ['jkset' => $jkset, 'webset' => $this->webset]);
    }

    #生成后台尝鲜列表
    public function newMovieList()
    {

        $dylist = $this->common->readData('dydata');
        return view('admin.newmovielist', [ 'dylist' => array_reverse($dylist)]);
    }

    #增加尝鲜数据
    public function addNewMovie()
    {
        return view('admin.addnewmovie');
    }

    #电影编辑界面
    public function editMovie($id)
    {

        $dylist = $this->common->readData('dydata');
        $dy = $dylist[$id];
        return view('admin.editmovie', [ 'dy' => $dy, 'id' => $id]);
    }

    #生成短网址
    public function makeUrl()
    {
        return view('admin.shorturl');
    }

    #生成友情连接添加页
    public function yqLink()
    {
        return view('admin.addyqlink');
    }

    #生成后台友情链接列表
    public function yqLinkList()
    {

        $yqlist = $this->common->readData('yqlink');
        return view('admin.yqlinklist', [ 'yqlist' => array_reverse($yqlist)]);
    }

    #友情编辑界面
    public function editYqLink($id)
    {

        $yqlist = $this->common->readData('yqlink');
        $yq = $yqlist[$id];
        return view('admin.edityq', [ 'yq' => $yq, 'id' => $id]);
    }

    #生成直播添加页
    public function addZb()
    {
        return view('admin.addzb');
    }

    #生成直播列表
    public function zbList()
    {
        $zblist = $this->common->readData('zblist');
        return view('admin.zblist', [ 'zblist' => array_reverse($zblist)]);
    }

    #直播编辑界面
    public function editZb($id)
    {

        $zblist = $this->common->readData('zblist');
        $zb = $zblist[$id];
        return view('admin.editzb', [ 'zb' => $zb, 'id' => $id]);
    }

    #对接微信
    public function WeiXin()
    {
        return view('admin.weixin');
    }

    #控制缓存
    public function flushCache()
    {
        return view('admin.cache');
    }

    #生成缓存设置界面
    public function cacheSet()
    {
        return view('admin.cacheset');
    }

    #设置广告
    public function setAd()
    {
        return view('admin.setad');
    }

    #设置APP信息
    public function appInfo()
    {
        return view('admin.appinfo');
    }

    #生成添加侵权页面
    public function addQq()
    {
        return view('admin.addqq');
    }

    #生成侵权列表
    public function qqList()
    {
        $qqlist = $this->common->readData('qqlist');
        return view('admin.qqlist', [ 'qqlist' => array_reverse($qqlist)]);
    }

    #生成编辑侵权界面
    public function editQq($id)
    {
        $qqlist = $this->common->readData('qqlist');
        $qq = $qqlist[$id];
        return view('admin.editqq', [ 'qq' => $qq, 'id' => $id]);
    }

    #生成添加轮播页面
    public function addBanner()
    {
        return view('admin.addbanner');
    }

    #生成轮播列表
    public function bannerList()
    {
        $bannerlist = $this->common->readData('bannerlist');
        return view('admin.bannerlist', [ 'bannerlist' => $bannerlist]);
    }

    #生成编辑轮播界面
    public function editBanner($id)
    {
        $bannerlist = $this->common->readData('bannerlist');
        $banner = $bannerlist[$id];
        return view('admin.editbanner', [ 'banner' => $banner, 'id' => $id]);
    }

    #生成添加导航页面
    public function addNav()
    {
        return view('admin.addnav');
    }

    #生成导航列表
    public function navList()
    {
        $navlist = $this->common->navSort();
        return view('admin.navlist', [ 'navlist' => $navlist]);
    }

    #生成编辑导航界面
    public function editNav($id)
    {
        $navlist = $this->common->readData('navlist');
        $nav = $navlist[$id];
        return view('admin.editnav', [ 'nav' => $nav, 'id' => $id]);
    }

    #生成编辑播放器界面
    public function playerSet(){
        return view('admin.playerset');
    }

    #生成cc防御设置界面
    public function ccDefense()
    {
        $cc_admin_ip = trim(implode('#', config('ccset.cc_admin_ip')), '#');
        return view('admin.ccdefense', [ 'cc_admin_ip' => $cc_admin_ip]);
    }


}