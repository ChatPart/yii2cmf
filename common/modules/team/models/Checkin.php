<?php

namespace common\modules\team\models;

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
class Checkin extends Event
{
    const  STATUS_delete = 2;


    /**
     * @inheritdoc
     */
    public function attributes()
    {
        $attribute = parent::attributes();
        $attribute += [
            //'_id',
            'event_id',
            'longitude',//经度 121.59996
            'latitude',//纬度 31.197646
            'radii',
            'period',
            //'status',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'longitude','latitude','radii', 'period', 'status'], 'safe'],
            //[['task_list_id', 'title', 'member', 'begin_at', 'end_at', 'file', 'commit', 'cover', 'status', 'created_at', 'detail_list_id','sequence'], 'safe'],
            /*[['status', 'sequence'],'integer'],
            [['begin_at', 'end_at','created_at'],'integer'],*/
        ];
    }
   /* public function fields(){
        return ['_id', 'event_id'];
    }
    public function extraFields()
    {
        return ['events'=>function(){
            return ['1',2,3];
        },'event'];
    }*/

    public function getEvent()
    {
        //return 'a';
        return $this->hasOne(Task::className(), ['id' => 'event_id']);
    }
    public function setEvent(){

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
