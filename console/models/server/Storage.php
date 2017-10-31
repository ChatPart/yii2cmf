<?php
namespace console\models\server;
use yii\redis\Connection;
class Storage extends \yii\base\Component
{
    /**
     * @var \redis
     */
    protected $redis;

    const PREFIX = 'eo';

    function __construct()
    {
        $this->redis = \Yii::$app->redis;
        //$redis->get('key');
        //$redis->set('k','v');
        //$this->redis = \Swoole::getInstance()->redis;
        $this->redis->del(self::PREFIX.':online');
        //$this->redis->set('xq','xqqqqqqqqqqqqq');
        //$this->config = $config;
    }

    function login($user_id,$client_id)
    {
        $this->redis->set(self::PREFIX . ':user:' . $user_id, $client_id);
        //$this->redis->set(self::PREFIX . ':client:' . $client_id, json_encode($info));
        //$this->redis->sAdd(self::PREFIX . ':online', $client_id);
    }

    function logout($client_id)
    {
        $this->redis->del(self::PREFIX.':client:'.$client_id);
        $this->redis->sRemove(self::PREFIX.':online', $client_id);
    }

    /**
     * 用户在线用户列表
     * @return array
     */
    function getOnlineUsers()
    {
        return $this->redis->sMembers(self::PREFIX . ':online');
    }

    /**
     * 批量获取用户信息
     * @param $users
     * @return array
     */
    function getUsers($users)
    {
        $keys = array();
        $ret = array();

        foreach ($users as $v)
        {
            $keys[] = self::PREFIX . ':client:' . $v;
        }

        $info = $this->redis->mget($keys);
        foreach ($info as $v)
        {
            $ret[] = json_decode($v, true);
        }

        return $ret;
    }

    /**
     * 获取单个用户信息
     * @param $userid
     * @return bool|mixed
     */
    function getUser($user_id)
    {
        $client_id = $this->redis->get(self::PREFIX . ':user:' . $user_id);
        //$client_id = json_decode($ret, true);

        return $client_id;
    }

    function exists($userid)
    {
        return $this->redis->exists(self::PREFIX . ':client:' . $userid);
    }

    function addHistory($userid, $msg)
    {
        $info = $this->getUser($userid);

        $log['user'] = $info;
        $log['msg'] = $msg;
        $log['time'] = time();
        $log['type'] = empty($msg['type']) ? '' : $msg['type'];

        table(self::PREFIX.'_history')->put(array(
            'name' => $info['name'],
            'avatar' => $info['avatar'],
            'msg' => json_encode($msg),
            'type' => empty($msg['type']) ? '' : $msg['type'],
        ));
    }

    function getHistory($offset = 0, $num = 100)
    {
        $data = array();
        $list = table(self::PREFIX.'_history')->gets(array('limit' => $num,));
        foreach ($list as $li)
        {
            $result['type'] = $li['type'];
            $result['user'] = array('name' => $li['name'], 'avatar' => $li['avatar']);
            $result['time'] = strtotime($li['addtime']);
            $result['msg'] = json_decode($li['msg'], true);
            $data[] = $result;
        }

        return array_reverse($data);
    }
}