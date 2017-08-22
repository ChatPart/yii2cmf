<?php

namespace wechat\controllers;

use common\models\Mp;
use common\models\WxUser;
use Yii;
use yii\base\Event;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

use Stoneworld\Wechat\Broadcast;
use Stoneworld\Wechat\Message;

class IndexController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $appId  = 'wx686e96a02575d9b6';
        $secret = 'aXzTOwOUcjuR0yO3isW-R5HkFeARPNnMuKYN_SYb05Q';
        $agentId = 1000002;
        $broadcast = new Broadcast($appId, $secret);
        $message = Message::make('text')->content('CONTENT');
        $re = $broadcast->fromAgentId($agentId)->send($message)->to('zxq');
        return $re;
    }


}