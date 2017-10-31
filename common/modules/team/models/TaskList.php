<?php

namespace common\modules\team\models;

use Yii;

/**
 * This is the model class for collection "task_list".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $board_id
 * @property mixed $status
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class TaskList extends \yii\mongodb\ActiveRecord
{
    const  STATUS_delete = 2;
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'task_list'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'board_id',
            'sequence',
            'status',
            'created_by',
            'created_at',
            'updated_at',
            'tasks',
        ];
    }

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $tasks;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['title', 'board_id', 'status', 'created_at', 'updated_at'];
        $scenarios[self::SCENARIO_UPDATE] = ['title', 'board_id', 'status', 'updated_at'];
        return $scenarios;
        /*return [
            self::SCENARIO_CREATE => ['title', 'board_id', 'status', 'created_at', 'updated_at'],
            self::SCENARIO_UPDATE => ['title', 'board_id', 'status', 'updated_at'],
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tasks','title', '_id','board_id', 'status', 'created_at', 'updated_at','sequence'], 'safe'],
            ['created_at', 'default', 'value' => time(),'on' => 'create'],
            ['updated_at', 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'title' => 'Title',
            'board_id' => 'Board ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
