<?php

namespace common\modules\staff\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $model_id
 * @property string $tag
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'tag'], 'required'],
            [['model_id'], 'integer'],
            [['tag'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'model_id' => 'model ID',
            'tag' => 'Tag',
        ];
    }
}
