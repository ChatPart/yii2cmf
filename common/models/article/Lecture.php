<?php

namespace common\models\article;

use Yii;
use common\behaviors\DynamicFormBehavior;
use yii\db\ActiveRecord;
use common\modules\attachment\behaviors\UploadBehavior;
use common\modules\attachment\models\Attachment;

/**
 * This is the model class for table "{{%article_lecture}}".
 *
 * @property integer $id
 * @property string $time
 * @property string $address
 * @property string $subject
 * @property string $content
 * @property string $speaker
 * @property string $lecturer_info
 * @property string $hint
 * @property string $poster
 * @property string $icon
 */
class Lecture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_lecture}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'address', ], 'required'],
            [['time'], 'safe'],
            [['content',  'hint', 'poster', ], 'string'],
            [['address',  'speaker'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => '演讲时间',
            'address' => '演讲地点',
            //'subject' => '主题',
            'content' => '内容',
            'speaker' => '演讲者',
            'hint' => '备注',
            'poster' => '发布者',
            'icon' => 'Icon',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'multiple' => true,
                'attribute' => 'icon',
                'entity' => __CLASS__
            ],
            [
                'class' => DynamicFormBehavior::className(),
                'formAttributes' => [
                    'content' => [
                        'type' => 'editor',
                    ],
            'time' => 'datetime',
            'address' => 'text',
            //'subject' => 'text',

            'speaker' => 'text',
            //'lecturer_info' => 'text',
            'hint' => 'text',
            //'poster' => '发布者',
            //'icon' => 'images',
                ]
            ]
        ];
    }
}
