<?php

namespace common\modules\team\models;

use Yii;

/**
 * This is the model class for collection "detail_list".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $title
 * @property mixed $status
 * @property mixed $sequence
 */
class DetailList extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['oa', 'detail_list'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'title',
            'status',
            'sequence',
            'task_id',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'status', 'sequence'], 'safe'],
            [['status', 'sequence'],'integer'],
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
            'status' => 'Status',
            'sequence' => 'Sequence',
        ];
    }
}
