<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/14
 * Time: 15:56
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;

class WeiXinController extends Controller
{
    private $core;
    public function __construct()
    {
        $this->core = new CoreController();
    }

    public function responseMsg()
    {

        $postStr = file_get_contents('php://input'); # php7的方式 输入流
        if (!empty($postStr)) {

            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = $postObj->Event;
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            switch ($postObj->MsgType) {
                case 'event':

                    if ($event == 'subscribe') {
                        //关注后的回复
                        $contentStr = config('wxconfig.recontent');
                        $msgType = 'text';
                        $textTpl = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                        echo $textTpl;

                    }
                    break;
                case 'text': {
                    $newsTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>4</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>";
                    if ($keyword <> "") {
                        $reswx = $this->core->getNews($keyword);
                        $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $reswx[0]['title'], '', $reswx[0]['img'],$reswx[0]['url'],$reswx[1]['title'], '', '',$reswx[1]['url'],$reswx[2]['title'], '', '',$reswx[2]['url'],$reswx[3]['title'], '', '',$reswx[3]['url']);
                        echo $resultStr;
                    }
                    $contentStr = " \r\n 输入电影名如：画江湖之不良人 即可在线观看！\r\n ";
                    $msgType = 'text';
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }
                    break;
                default:
                    break;
            }

        } else {
            echo "你好！欢迎进入" . config('webset.webname') . "微信公众号";
            exit;
        }
    }

}