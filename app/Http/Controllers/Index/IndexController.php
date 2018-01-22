<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/11/20
 * Time: 20:44
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Common\CommonController;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Core\CoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    private $core;
    private $common;
    private $jk;
    private $fenlei;
    private $newlist;
    private $yqlist;
    private $bannerlist;
    private $nav;

    public function __construct()
    {
        #初始化采集核心
        $this->core = new CoreController();
        #初始化公共控制器
        $this->common = new CommonController();
        #初始化设置
        $this->jk = config('jkset');
        #初始化分类
        $this->fenlei = config('fenlei');
        #读取尝鲜列表
        $this->newlist = $this->common->readData('dydata');
        #读取友链列表
        $this->yqlist = $this->common->readData('yqlink');
        #读取轮播列表
        $this->bannerlist = $this->common->readData('bannerlist');
        #读取导航列表
        $this->nav = $this->common->navSort();


    }

    #生成首页
    public function index($action = '')
    {
        if (Cache::has('static_index') && $action == '') {
            return Cache::get('static_index');
        }
        $dytype = ($this->fenlei)['movie'];
        if (config('webset.randmovie')) {
            $ds = $this->core->dsjList('all', rand(1, 24));
            $zy = $this->core->zyList('all', rand(1, 24));
            $dm = $this->core->dmList('all', rand(1, 24));
            $dy = $this->core->dyList('all', rand(1, 24));
        } else {
            $ds = $this->core->dsjList('all', 1);
            $zy = $this->core->zyList('all', 1);
            $dm = $this->core->dmList('all', 1);
            $dy = $this->core->dyList('all', 1);
        }
        #渲染页面
        $res = view('template.' . config('webset.webtemplate') . '.index', ['dsjs' => $ds, 'dys' => $dy, 'zys' => $zy, 'dms' => $dm, 'index' => 1, 'yqlist' => $this->yqlist, 'dydata' => array_reverse($this->newlist), 'dytype' => $dytype, 'bannerlist' => array_reverse($this->bannerlist), 'navlist' => $this->nav])->__toString();
        Cache::forever('static_index', $res);
        return $res;
    }

    #生成电影列表
    public function dy($cat = 'all', $page = '1')
    {
        $dys = $this->core->dyList($cat, $page);
        $pagehtml = $this->getPageHtml($page, 24, $cat, 'movielist');
        return view('template.' . config('webset.webtemplate') . '.movie', ['dys' => $dys, 'pagehtml' => $pagehtml, 'dytype' => ($this->fenlei)['movie'], 'yqlist' => $this->yqlist, 'navlist' => $this->nav]);
    }

    #生成尝鲜视频列表列表
    public function cX()
    {

        return view('template.' . config('webset.webtemplate') . '.cx', ['dydata' => array_reverse($this->newlist), 'yqlist' => $this->yqlist, 'navlist' => $this->nav]);
    }

    #生成电视剧列表
    public function tv($cat = 'all', $page = '1')
    {
        $dsj = $this->core->dsjList($cat, $page);
        $pagehtml = $this->getPageHtml($page, 24, $cat, 'tvlist');
        return view('template.' . config('webset.webtemplate') . '.tv', ['dsj' => $dsj, 'pagehtml' => $pagehtml, 'tvtype' => ($this->fenlei)['tv'], 'yqlist' => $this->yqlist, 'navlist' => $this->nav]);
    }

    #生成综艺列表
    public function zy($cat = 'all', $page = '1')
    {
        $zys = $this->core->zyList($cat, $page);
        $pagehtml = $this->getPageHtml($page, 24, $cat, 'zylist');
        return view('template.' . config('webset.webtemplate') . '.zy', ['zys' => $zys, 'pagehtml' => $pagehtml, 'zytype' => ($this->fenlei)['zy'], 'yqlist' => $this->yqlist, 'navlist' => $this->nav]);
    }

    #生成动漫列表
    public function dm($cat = 'all', $page = '1')
    {
        $dms = $this->core->dmList($cat, $page);
        $pagehtml = $this->getPageHtml($page, 24, $cat, 'dmlist');
        return view('template.' . config('webset.webtemplate') . '.dm', ['dms' => $dms, 'pagehtml' => $pagehtml, 'dmtype' => ($this->fenlei)['dm'], 'yqlist' => $this->yqlist, 'navlist' => $this->nav]);
    }

    #生成播放页
    public function play(Request $request, $play)
    {
        $has = $this->common->filterQq($play);
        if ($has == 1) {
            return view('template.' . config('webset.webtemplate') . '.qqtip');
        }
        $history = $this->getHistroy($request);
        if ($history) {
            krsort($history);
        }
        if (is_numeric($play)) {
            $path = DATA_PATH . 'dydata.json';
            $str = file_get_contents($path);
            $dylist = json_decode($str, true);
            $dy = $dylist[$play];
            $js = $this->common->getJs($dy['dyaddr']);
            $dy['dyaddr'] = $js;
            return view('template.' . config('webset.webtemplate') . '.otherplay', ['cxs' => $dy, 'yqlist' => $this->yqlist, 'history' => $history, 'navlist' => $this->nav]);
        }
        $url = base64_decode($play);
        if (strpos($url, 'om/m/') !== false) {
            #判断是否为电影
            $res = $this->core->getDyPlay($url);
            return view('template.' . config('webset.webtemplate') . '.mplay', ['desc' => $res[0]['desc'], 'pm' => $res[0]['title'], 'dyplay' => $res, 'jk' => $this->jk, 'yqlist' => $this->yqlist, 'history' => $history, 'navlist' => $this->nav]);
        } elseif (strpos($url, 'om/tv/') !== false) {
            #判断是否为电视
            $playlist = $this->getTvList($url, 2);//获取电视剧列表
            $res = $this->core->getDsjPlay($url);
            if ($playlist) {
                return view('template.' . config('webset.webtemplate') . '.tvplay', ['desc' => $res[0]['desc'], 'pm' => $res[0]['title'], 'js' => $playlist, 'jk' => $this->jk, 'yqlist' => $this->yqlist, 'history' => $history, 'navlist' => $this->nav]);
            }

        } elseif (strpos($url, 'om/ct/') !== false) {
            #判断是否为动漫
            $playlist = $this->getTvList($url, 4);//获取动漫列表
            $res = $this->core->getDsjPlay($url);
            if ($playlist) {
                return view('template.' . config('webset.webtemplate') . '.dmplay', ['desc' => $res[0]['desc'], 'pm' => $res[0]['title'], 'js' => $playlist, 'jk' => $this->jk, 'yqlist' => $this->yqlist, 'history' => $history, 'navlist' => $this->nav]);
            }

        } elseif (strpos($url, 'om/va/') !== false) {
            #判断是否为综艺
            $res = $this->getZyList($url);
            return view('template.' . config('webset.webtemplate') . '.zyplay', ['desc' => $res[0]['desc'], 'pm' => $res[0]['bt'], 'zylist' => $res, 'zd' => $res[0]['zd'], 'jk' => $this->jk, 'yqlist' => $this->yqlist, 'history' => $history, 'navlist' => $this->nav]);
        }


    }

    #生成直播页面
    public function zhiBo()
    {
        $path = DATA_PATH . 'zblist.json';
        $str = file_get_contents($path);
        $zblist = json_decode($str, true);
        return view('template.' . config('webset.webtemplate') . '.zhibo', ['yqlist' => $this->yqlist, 'zblist' => $zblist, 'navlist' => $this->nav]);
    }

    #生成直播播放页
    public function zbPlay($id)
    {
        $path = DATA_PATH . 'zblist.json';
        $str = file_get_contents($path);
        $zblist = json_decode($str, true);
        $zb = $zblist[$id];
        return view('template.' . config('webset.webtemplate') . '.zbplay', ['yqlist' => $this->yqlist, 'zb' => $zb, 'navlist' => $this->nav]);
    }

    //获取电视剧列表
    private function getTvList($url, $type)
    {
        $url = str_replace('https://', '', $url);
        $arr = explode('/', $url);
        $id = str_replace('.html', '', $arr[2]);
        $arr = ['youku' => '优酷视频', 'qq' => '腾讯视频', 'imgo' => '芒果TV', 'qiyi' => '爱奇艺', 'levp' => '乐视视频', 'cntv' => 'CNTV', 'sohu' => '搜狐视频', 'tudou' => '土豆视频', 'pptv' => 'PPTV'];
        $jg = [];
        foreach ($arr as $key => $v) {
            $api = 'https://www.360kan.com/cover/switchsite?site=' . $key . '&id=' . $id . '&category=' . $type;
            $res = json_decode($this->common->curl_get($api), true);
            if ($res['error'] == 0) {
                $sp['name'] = $v;
                $sp['data'] = $res['data'];
                $jg[] = $sp;
            }
        }
        return $jg;
    }

    #获取综艺
    private function getZyList($url)
    {
        $res = $this->core->getZyPlay($url);
        return $res;
    }

    #生成APP页面
    public function appInfo()
    {
        return view('template.' . config('webset.webtemplate') . '.appinfo');
    }

    #获取搜索结果并显示
    public function Search($key)
    {
        $res = $this->core->getSearch($key);
        $cxs = $this->common->seacherCx($key);
        return view('template.' . config('webset.webtemplate') . '.search', ['ss' => $res, 'cxs' => $cxs, 'searchkey' => $key, 'navlist' => $this->nav, 'yqlist' => $this->yqlist]);
    }

    #分页
    private function getPageHtml($xzv_0, $xzv_4, $cat, $type)
    {
        $xzv_6 = 5;
        $xzv_1 = '';
        $xzv_0 = $xzv_0 < 1 ? 1 : $xzv_0;
        $xzv_0 = $xzv_0 > $xzv_4 ? $xzv_4 : $xzv_0;
        $xzv_4 = $xzv_4 < $xzv_0 ? $xzv_0 : $xzv_4;
        $xzv_3 = $xzv_0 - floor($xzv_6 / 2);
        $xzv_3 = $xzv_3 < 1 ? 1 : $xzv_3;
        $xzv_2 = $xzv_0 + floor($xzv_6 / 2);
        $xzv_2 = $xzv_2 > $xzv_4 ? $xzv_4 : $xzv_2;
        $xzv_5 = $xzv_2 - $xzv_3 + 1;
        if ($xzv_5 < $xzv_6 && $xzv_3 > 1) {
            $xzv_3 = $xzv_3 - ($xzv_6 - $xzv_5);
            $xzv_3 = $xzv_3 < 1 ? 1 : $xzv_3;
            $xzv_5 = $xzv_2 - $xzv_3 + 1;
        }
        if ($xzv_5 < $xzv_6 && $xzv_2 < $xzv_4) {
            $xzv_2 = $xzv_2 + ($xzv_6 - $xzv_5);
            $xzv_2 = $xzv_2 > $xzv_4 ? $xzv_4 : $xzv_2;
        }
        if ($xzv_0 > 1) {
            if (config('webset.webtemplate') == 'wapian') {
                $xzv_1 .= '<li><a  title="上一页" href="' . '/' . $type . '/' . $cat . '/' . ($xzv_0 - 1) . '.html' . '"">上一页</a></li>';
            } else {
                $xzv_1 .= '<a  title="上一页" href="' . '/' . $type . '/' . $cat . '/' . ($xzv_0 - 1) . '.html' . '"">上一页</a>';
            }

        }
        for ($xzv_8 = $xzv_3; $xzv_8 <= $xzv_2; $xzv_8++) {
            if ($xzv_8 == $xzv_0) {
                if (config('webset.webtemplate') == 'wapian') {
                    $xzv_1 .= '<li><a style="background:#ff6651;"><font color="#fff">' . $xzv_8 . '</font></a></li>';
                } else {
                    $xzv_1 .= '<a style="background:#ff6651;"><font color="#fff">' . $xzv_8 . '</font></a>';
                }
            } else {
                if (config('webset.webtemplate') == 'wapian') {
                    $xzv_1 .= '<li><a href="' . '/' . $type . '/' . $cat . '/' . $xzv_8 . '.html' . '">' . $xzv_8 . '</a></li>';
                } else {
                    $xzv_1 .= '<a href="' . '/' . $type . '/' . $cat . '/' . $xzv_8 . '.html' . '">' . $xzv_8 . '</a>';
                }
            }
        }
        if ($xzv_0 < $xzv_2) {
            if (config('webset.webtemplate') == 'wapian') {
                $xzv_1 .= '<li><a  title="下一页" href="' . '/' . $type . '/' . $cat . '/' . ($xzv_0 + 1) . '.html' . '"">下一页</a></li>';
            } else {
                $xzv_1 .= '<a  title="下一页" href="' . '/' . $type . '/' . $cat . '/' . ($xzv_0 + 1) . '.html' . '"">下一页</a>';
            }
        }
        return $xzv_1;
    }

    #渲染加载广告
    public function jzAd()
    {
        return view('template.' . config('webset.webtemplate') . '.jzad');
    }

    #存入观看历史记录
    public function history(Request $request)
    {
        $this->common->saveHistory($request);
    }

    #读取历史记录
    public function getHistroy(Request $request)
    {
        $history = $request->cookie('history');
        if ($history) {
            return $history;
        }
    }
}