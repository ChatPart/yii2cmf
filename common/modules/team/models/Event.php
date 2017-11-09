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
 * @property int $created_by
 * @property mixed $detail_list_id
 */
class Event extends \yii\mongodb\ActiveRecord
{
    const  STATUS_delete = 2;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'task'];
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
            'task_list_id',
            'created_by',
            //'user_id',
            'title',
            'description',
            'members',//array
            'begin_at',
            'end_at',
            'file',
            'commit',
            'cover',
            'status',
            'created_at',
            'detail_list_id',//array
            'sequence',
            'tags',
            'type',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_list_id', 'title','description','created_by', 'members', 'begin_at', 'end_at', 'file', 'commit', 'cover', 'status','type','tags', 'created_at', 'detail_list_id','sequence'], 'safe'],
            [['status', 'sequence','tags','created_by','begin_at', 'end_at','created_at'],'integer'],
            //[[],'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'task_list_id' => 'Task List ID',
            'title' => 'Title',
            'description' => 'Description',
            'members' => 'Members',
            'begin_at' => 'Begin At',
            'end_at' => 'End At',
            'file' => 'File',
            'commit' => 'Commit',
            'cover' => 'Cover',
            'status' => 'Status',
            'created_at' => 'Created At',
            'detail_list_id' => 'Detail List ID',
        ];
    }

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
