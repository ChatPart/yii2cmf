<?php

namespace common\models\article;

use Yii;
use common\modules\attachment\behaviors\UploadBehavior;
use common\behaviors\DynamicFormBehavior;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $student_id
 * @property string $name
 * @property string $email
 * @property string $created_at
 * @property integer $status
 * @property string $info
 * @property resource $icon
 * @property string $grade
 * @property string $job
 * @property string $degree
 * @property string $achievement
 * @property string $major
 * @property string $due
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%student}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'grade', 'due'], 'safe'],
            [['status'], 'integer'],
            [['info', 'icon', 'achievement'], 'string'],
            [['student_id', 'name', 'email', 'job', 'degree'], 'string', 'max' => 255],
            [['major'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'name' => '姓名',
            'email' => '邮箱',
            'created_at' => 'Created At',
            'status' => 'Status',
            'info' => '简介',
            'icon' => '头像',
            'grade' => '年级',
            'job' => '去向',
            'degree' => '学位',
            'achievement' => '学术成果',
            'major' => '专业',
            'due' => '届',
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => '头像'
            ],
            [
                'class' => DynamicFormBehavior::className(),
                'formAttributes' => [
                    'info' => [
                        'type' => 'editor',
                    ],
                    'name' => 'text',
                    'email' => 'text',
                    'job' => 'text',
                    'degree' => 'text',
                    'achievement' => 'text',
                    'major' => 'text',
                    'due' => 'text',
                    '头像' => [
                        'type' => 'images',
                        'option' => ['widgetOptions' => ['onlyUrl' => false]]
                    ]
                ]
            ]
        ];
    }
}
