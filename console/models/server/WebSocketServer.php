<?php
namespace console\models\server;


use yii\console\Exception;

class WebSocketServer
{
    private $_serv;
    protected $storage;
    protected $users;

    public function __construct()
    {
        $this->_serv = new \swoole_websocket_server("127.0.0.1", 9502);
        $this->_serv->set([
            'worker_num' => 3,
        ]);

        $this->_serv->on('open', [$this, 'onOpen']);

        $this->_serv->on('message', [$this, 'onMessage']);
        //$this->_serv->on('login', [$this, 'onMessage']);
        $this->_serv->on('close', [$this, 'onClose']);

        $this->storage = new Storage();
    }

    /**
     * @param $serv
     * @param $request
     */
    public function onOpen($serv, $frame)
    {
        $msg = json_decode($frame->data);
        $this->storage->login($frame->fd,$msg->access_token);
        echo "server: handshake success with fd{$frame->fd}.\n";
    }

    /**
     * @param $serv
     * @param $frame
     */
    public function onMessage($serv, $frame)
    {
        //echo $frame->data;
        try{
            $msg = json_decode($frame->data);

        }catch (\Exception $e){
            throw new Exception('信息错误');
        }

        $func = 'cmd_'.$msg->type ;  //执行对应的方法
        if (method_exists($this, $func))
        {
            $this->$func($frame->fd, $msg);
        } else
        {
            // 反馈错误
            $this->sendErrorMessage($frame->fd, 102, "command $func no support.");
            //$serv->push($frame->fd, json_encode($ret));
            return;
        }

        //$serv->push($frame->fd, "server received data :{$frame->data}");
        //$ret = ['cmd'=>'login','username'=>'999999999','token'=>'ccccc'];

        //$serv->push($frame->fd, json_encode($ret));

    }

    public function onClose($serv, $fd)
    {
        echo "client {$fd} closed.\n";
    }

    public function start()
    {
        $this->_serv->start();
    }

    function sendErrorMessage($client_id, $code, $msg)
    {
        $ret = json_encode(['type' => 'error', 'code' => $code, 'msg' => $msg]);
        $this->push($client_id, $ret);
    }

    /**
     * 登录
     * @param $client_id
     * @param $msg
     */
    function cmd_login($client_id, $msg)
    {
        $info['name'] = Filter::escape(strip_tags($msg['name']));
        $info['avatar'] = Filter::escape($msg['avatar']);

        //回复给登录用户
        $resMsg = array(
            'cmd' => 'login',
            'fd' => $client_id,
            'name' => $info['name'],
            'avatar' => $info['avatar'],
        );

        //把会话存起来
        $this->users[$client_id] = $resMsg;

        $this->storage->login($client_id, $resMsg);
        $this->sendJson($client_id, $resMsg);

        //广播给其它在线用户
        $resMsg['cmd'] = 'newUser';
        //将上线消息发送给所有人
        $this->broadcastJson($client_id, $resMsg);
        //用户登录消息
        $loginMsg = array(
            'cmd' => 'fromMsg',
            'from' => 0,
            'channal' => 0,
            'data' => $info['name'] . "上线了",
        );
        $this->broadcastJson($client_id, $loginMsg);
    }
}
