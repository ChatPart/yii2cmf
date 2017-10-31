<?php

namespace common\modules\chat\models;

use Yii;

/**
 * This is the model class for collection "task".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $task_list_id
 * @property mixed $title
 * @property mixed $description
 * @property array $members 成员们
 * @property mixed $begin_at
 * @property mixed $end_at
 * @property mixed $file
 * @property mixed $commit 评论
 * @property array $tags
 * @property mixed $cover 封面
 * @property mixed $status
 * @property mixed $type 类型
 * @property mixed $created_at
 * @property mixed $detail_list_id
 */
class Message extends \yii\mongodb\ActiveRecord
{
    const  TYPE_singleChat  = 1;
    const  TYPE_groupChat   = 2;
    const  TYPE_joinFriend  = 3;
    const  TYPE_joinSwarm   = 4;
    const  TYPE_removeFriend= 5;
    const  TYPE_quitSwram   = 6;
    const  TYPE_loginOut    = 7;
    const  TYPE_removeGroup = 8;
    const  TYPE_addGroup    = 9;
    const  TYPE_sendCheckMsg= 10;
    const  TYPE_createSwarm = 11;
    const  TYPE_deleteSwarm = 12;
    const  TYPE_removeFriendrSwarm=  13;
    const  TYPE_joinSwarmSuccess =14;
    const  TYPE_changeLine = 15;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'message'];
    }

    /*public static function primaryKey(){
        return '_id';
    }*/
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'from_user_id',
            'to_user_id',//array
            'type',
            'content',//array
            'created_at',
            'status',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'from_user_id','to_user_id', 'type', 'content','created_at','status'], 'safe'],
            [['status', 'type'],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'task_list_id' => 'Task List ID',
            'title' => 'Title',
            'description' => 'Description',
            'member' => 'Member',
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'file' => 'File',
            'commit' => 'Commit',
            'cover' => 'Cover',
            'status' => 'Status',
            'created_at' => 'Created At',
            'detail_list_id' => 'Detail List ID',
        ];
    }*/

    /*public function delete()
    {
        $result = false;
        if ($this->beforeDelete()) {
            $result = $this->deleteInternal();
            $this->afterDelete();
        }

        return $result;
    }*/
}
