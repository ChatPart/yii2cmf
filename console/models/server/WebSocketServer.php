<?php
namespace console\models\server;


class WebSocketServer
{
    private $_serv;

    public function __construct()
    {
        $this->_serv = new \swoole_websocket_server("127.0.0.1", 9502);
        $this->_serv->set([
            'worker_num' => 1,
        ]);
        $this->_serv->on('open', [$this, 'onOpen']);
        $this->_serv->on('message', [$this, 'onMessage']);
        //$this->_serv->on('login', [$this, 'onMessage']);
        $this->_serv->on('close', [$this, 'onClose']);
    }

    /**
     * @param $serv
     * @param $request
     */
    public function onOpen($serv, $request)
    {
        echo "server: handshake success with fd{$request->fd}.\n";
    }

    /**
     * @param $serv
     * @param $frame
     */
    public function onMessage($serv, $frame)
    {
        echo $frame->data;
        echo json_decode($frame->data)."\n";
        //$serv->push($frame->fd, "server received data :{$frame->data}");
        $ret = ['cmd'=>'login','username'=>'999999999','token'=>'ccccc'];

        $serv->push($frame->fd, json_encode($ret));
    }

    public function onClose($serv, $fd)
    {
        echo "client {$fd} closed.\n";
    }

    public function start()
    {
        $this->_serv->start();
    }
}
