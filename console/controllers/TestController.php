<?php
/**
 * Created by PhpStorm.
 * User: xq
 * Date: 17-9-10
 * Time: 下午1:52
 */

namespace console\controllers;

use common\models\Article;
use yii\base\Exception;
use yii\console\Controller;

class TestController extends Controller
{
    public function actionWstest(){
        $server = new \console\models\server\WebSocketServer;
        $server->start();
    }

    public function actionIndex()
    {
        define('DEBUG', 'on');
        define('WEBPATH', __DIR__.'/webroot');
        define('ROOT_PATH', __DIR__);

        /**
         * Swoole框架自动载入器初始化
         */
        //\Swoole\Loader::vendorInit();

        /**
         * 注册命名空间到自动载入器中
         */
        //\Swoole\Loader::addNameSpace('WebIM', __DIR__.'/src/');
        //\Swoole::getInstance()->config->setPath(__DIR__.'/configs');

//设置PID文件的存储路径
        //\Swoole\Network\Server::setPidFile(__DIR__ . '/log/webim_server.pid');
        //\Swoole\Network\Server::setPidFile(__DIR__ . '/console/runtime/logs/webim_server.pid');

        /**
         * 显示Usage界面
         * php app_server.php start|stop|reload
         */
        \Swoole\Network\Server::start(function ()
        {
            //$config = Swoole::getInstance()->config['webim'];
            $config = \Yii::$app->params->get('webim');

            $webim = new \Swoole\Protocol\CometServer($config);
            $webim->loadSetting(__DIR__ . "/swoole.ini"); //加载配置文件

            /**
             * webim必须使用swoole扩展
             */
            $server = new \Swoole\Network\Server($config['server']['host'], $config['server']['port']);
            $server->setProcessName('webim-server');
            $server->setProtocol($webim);
            $server->run($config['swoole']);
        });
    }

    public function actionRun()
    {

        echo 'cc';
        $serv = new \swoole_server('127.0.0.1', 9501);
        $serv->set([
            'worker_num' => 2,
        ]);
        //new Article();

        $serv->on('Connect', function ($serv, $fd) {
            echo "new client connected." . PHP_EOL;
        });
        /*$serv->on('news', function ($serv, $fd) {
            echo "hahahahahhaha" . PHP_EOL;
        });*/

        $serv->on('Receive', function ($serv, $fd, $fromId, $data) {
            // 收到数据后发送给客户端
            $serv->send($fd, 'Server '. $data);
        });

        $serv->on('Close', function ($serv, $fd) {
            echo "Client close." . PHP_EOL;
        });
        $serv->start();
    }

    public function actionIo(){
        $serv = new \swoole_server("127.0.0.1", 9501);

        $serv->on('Open', function($server, $req) {
            echo "connection open: ".$req->fd . "\n";
        });


        $serv->on('Close', function($server, $fd) {
            # 连接断开时将客户端id从队列中删除
            echo 'close!!!!';
            //Db_Redis::hdel(SwooleController::QU_ALLCOIN, $fd);
        });

        $serv->on('WorkerStart', function ($server, $workerId) {
            echo "worker started: {$workerId}\n";
            if ($workerId == 0) {
                # 定时推送数据

            }
        });

        $serv->start();
    }
}