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
 * @property mixed $member
 * @property mixed $begin_at
 * @property mixed $end_at
 * @property mixed $file
 * @property mixed $commit
 * @property mixed $cover
 * @property mixed $status
 * @property mixed $created_at
 * @property mixed $detail_list_id
 */
class Task extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'task'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'task_list_id',
            'title',
            'description',
            'member',//array
            'begin_at',
            'end_at',
            'file',
            'commit',
            'cover',
            'status',
            'created_at',
            'detail_list_id',//array
            'sequence',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_list_id', 'title', 'description', 'member', 'begin_at', 'end_at', 'file', 'commit', 'cover', 'status', 'created_at', 'detail_list_id','sequence'], 'safe'],
            [['status', 'sequence'],'integer'],
            [['begin_at', 'end_at','created_at'],'integer'],
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
    }
}
