<?php

namespace common\models\article;

use common\behaviors\DynamicFormBehavior;
use Yii;

/**
 * This is the model class for table "article_achievement".
 *
 * @property integer $id
 * @property string $author
 * @property string $subject
 * @property string $periodical
 * @property string $year
 * @property string $year_id
 * @property string $address
 * @property string $serial_number
 * @property string $ei
 * @property string $hint
 * @property string $publish_at
 * @property string $create_at
 */
class Achievement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_achievement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'subject', 'periodical'], 'required'],
            [['subject', 'serial_number', 'ei', 'hint'], 'string'],
            [['year', 'publish_at', 'create_at'], 'safe'],
            [['author', 'periodical', 'address'], 'string', 'max' => 255],
            [['year_id'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => '作者',
            'subject' => '论文题目',
            'periodical' => '期刊/会议名称',
            'year' => 'Year',
            'year_id' => 'Year ID',
            'address' => 'Address',
            'serial_number' => '卷期页码',
            'ei' => 'Ei',
            'hint' => '备注',
            'publish_at' => 'Publish At',
            'create_at' => 'Create At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => DynamicFormBehavior::className(),
                'formAttributes' => [
                    'author' => 'text',
                    'subject' => 'text',
                    'periodical' => 'text',
                    'year' => [
                        'type' => 'date',
                        'options' => [
                            'widgetOptions' => [
                                'pluginOptions' => [
                                    'format' => 'yyyy',
                                    'todayHighlight' => true
                                ]
                            ]
                        ]
                    ],
                    'address' => 'text',
                    'serial_number' => 'text',
                    'ei' => 'text',
                    'hint' => 'textarea',
                    'publish_at' => [
                        'type' => 'date',
                        'options' => [
                            'widgetOptions' => [
                                'pluginOptions' => [
                                    'format' => 'yyyy-MM-dd',
                                    'todayHighlight' => true
                                ]
                            ]
                        ]
                    ],
                    'create_at' => [
                        'type' => 'date',
                        'options' => [
                            'widgetOptions' => [
                                'pluginOptions' => [
                                    'format' => 'yyyy-MM-dd',
                                    'todayHighlight' => true
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ];
    }
}
