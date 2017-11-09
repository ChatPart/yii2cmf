<?php
namespace console\models\server;


use common\modules\chat\models\Message;
use yii\console\Exception;

class WebSocketServer
{
    private $_serv;
    protected $storage;
    protected $users;

    public function __construct()
    {
        $this->_serv = new \swoole_websocket_server("127.0.0.1", 9501);
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
        //$msg = json_decode($frame->data);
        //$this->storage->login($frame->fd,$msg->access_token);
        echo "server: handshake success with fd{$frame->fd}.\n";
    }

    /**
     * 接受到消息
     * @param $serv
     * @param $frame
     */
    public function onMessage($serv, $frame)
    {

        //try{       //解析消息内容为数组
            $msg = json_decode($frame->data,true); //示例： {'type':'login','content':'55555555555','to_user':3}
            $Message = new Message();

            $Message->from_user_id = @$this->users[$frame->fd];

            $Message->to_user_id = isset($msg['to_user'])?$msg['to_user']:0;

            $Message->type = $msg['type'];

            $Message->content= $msg['content'];
            $Message->created_at = time();
            $Message->status= Message::STATUS_stay;


        /*}catch (\Exception $e){
            throw new Exception('信息错误');
        }*/

        try{

            $typeName = Message::type[$msg['type']];
            $func = 'cmd_'.$typeName;  //执行对应的cmd方法


            if (method_exists($this, $func))
            {
                $this->$func($frame->fd, $Message);
            } else
            {
                $errorMsg = "类型无效";
            }
        }catch (\Exception $e){
            // 反馈错误
            $this->sendErrorMessage($frame->fd, 102, "发送失败，请重发");
            return;
        }
    }

    public function onClose($serv, $fd)
    {
        unset($this->users[$fd]);
        echo "client {$fd} closed.\n";
    }

    public function start()
    {
        $this->_serv->start();
    }

    function sendErrorMessage($client_id, $code, $msg)
    {
        $ret = json_encode(['type' => 'error', 'code' => $code, 'msg' => $msg]);
        $this->_serv->push($client_id, $ret);
    }

    /**
     * 登录
     * @param $client_id
     * @param $msg
     */
    function cmd_login($client_id, &$msg)
    {
        $access_token = $msg->content;

        $user = \common\modules\user\models\User::findIdentityByAccessToken($access_token);  // 根据 access_token 获取当前用户

        //回复给登录用户
        if(!empty($user)) {
            echo $user->username."\n";
            $re = [
                //'cmd' => 'login',
                'fd' => $client_id,
                'user_id' => $user->id,
                //'access_token' => $info['name'],
            ];

            //把会话存起来
            $this->users[$client_id] = $user->id;
            $this->storage->login($user->id, $client_id); // [client_id => user_id]
            //设置返回信息


           //获取离线消息
            $to_messages = Message::find()->where([
                'to_user_id' => $user->id,
                //'status' => Message::STATUS_stay,
            ])->andWhere(['>', 'from_user_id', 0])->orderBy('created_at')->all();

            $from_messages = Message::find()->where([
                'from_user_id' => $user->id,
                //'status' => Message::STATUS_stay,
            ])->andWhere(['>', 'to_user_id', 0])->orderBy('created_at')->all();


            $users = [];
            $chatlists = [];
            $chatlists_id = 0;

            foreach ($to_messages as $k => $v) {
                if (in_array($v->from_user_id, $users)) {
                    $chatlists[$v->from_user_id]['id'] = ++$chatlists_id;
                    $chatlists[$v->from_user_id]['user'] = [
                        'user_id'=>$v->from_user_id,
                        'name'=>$v->from_user_id,
                        'img'=>'http://yii.com/storage/upload/avatar/1/e5683d07c9e9e7f108d6d1cf16b5a3f5_96_96.jpeg'
                    ];

                    $chatlists[$v->from_user_id]['messages'][] = ['content' => $v->content, 'date' => $v->created_at];
                    $chatlists[$v->from_user_id]['index'] = $chatlists_id;
                } else {
                    $users[] = $v->from_user_id ;
                    $chatlists[$v->from_user_id] = [
                        'user'    => $v->from_user_id,
                        'messages' => [['content' => $v->content, 'date' => $v->created_at]]
                    ];
                }
            }

            foreach ($from_messages as $k => $v) {
                if (in_array($v->to_user_id, $users)) {

                    $chatlists[$v->to_user_id]['id'] = ++$chatlists_id;
                    $chatlists[$v->to_user_id]['user'] = [
                        'user_id'=>$v->to_user_id,
                        'name'=>$v->to_user_id,
                        'img'=>'http://yii.com/storage/upload/avatar/1/e5683d07c9e9e7f108d6d1cf16b5a3f5_96_96.jpeg'
                    ];

                    $chatlists[$v->to_user_id]['messages'][] = ['content' => $v->content, 'date' => $v->created_at, 'self' => true];
                    $chatlists[$v->to_user_id]['index'] = $chatlists_id;

                } else {
                    $users[] = $v->to_user_id;
                    $chatlists[$v->to_user_id] = [
                        'user' => $v->to_user_id,
                        'messages' => [['content' => $v->content, 'date' => $v->created_at, 'self' => true]]
                    ];
                }
            }



            $re['message_status'] = 0 ;
            $re['type'] = 'login';
            $re['content'] = $user->username.'上线';
            $re['chatlist'] = array_values($chatlists);

            if($this->_serv->push($client_id, json_encode($re))){
                $msg->from_user_id = $user->id;
                $msg->status = Message::STATUS_receive;
                $msg->save();
            }

            //echo $user->username."\n";
            //echo $access_token."\n";

            /*//广播给其它在线用户
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
            $this->broadcastJson($client_id, $loginMsg);*/

        }else{
            echo '登录失败'."\n";
            $this->sendErrorMessage($client_id, 103, "登录失败");
        }
    }

    function cmd_self_revert($client_id,$msg){
        $ret = json_encode(['message_status' => '1', 'content' => $msg['content'].'cccc' ]);
        $this->_serv->push($client_id, $ret);
    }

    function cmd_singleChat($client_id,$msg){

        $from_user_id = $msg->from_user_id;//$this->users[$client_id];
        $to_user_id = $msg->to_user_id;

        $to_user_fd = $this->storage->getUser($to_user_id);

        echo 'to_user_id:'.$to_user_id."\n";
        echo 'to_user:'.$to_user_fd."\n";

        /* 示例
         * $msg=[
                'message_status',
                'content',
                //'from_user_id',
                'timestamp',
                //'to_user_id'
            ];
        */
        $ret = json_encode(
            [
                'message_status' => 1,
                'content' => $msg->content,
                'from_user_id'=>$from_user_id,
                'timestamp'=>$msg->created_at,
            ]
        );
//echo $to_user."\n";
        if($this->_serv->push($to_user_fd, $ret)){
            $msg->status = Message::STATUS_receive;
            $msg->save();
        }else{
            $msg->status = Message::STATUS_stay;
            $msg->save();
        }


    }
}
