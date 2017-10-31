<?php

namespace common\models\article;

use common\modules\attachment\behaviors\UploadBehavior;
use common\modules\attachment\models\Attachment;
use common\traits\EntityTrait;
use Yii;
use common\behaviors\DynamicFormBehavior;

/**
 * This is the model class for table "{{%article_teacherdoc}}".
 *
 * @property integer $id
 * @property Attachment[] $doc
 */
class Teacherdoc extends \yii\db\ActiveRecord
{
    use EntityTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_teacherdoc}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doc'], 'required'],
            //['doc', 'safe'],
            ['content', 'string'],
            [['id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc' => '文件',
            'content' => '描述',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'doc'
            ],
            [
                'class' => DynamicFormBehavior::className(),
                'formAttributes' => [
                    'doc' => [
                        'type' => 'file',
                        'options' => ['widgetOptions' => ['onlyUrl' => false]]
                    ],
                    'content' => [
                        'type' => 'editor',
                        /*'options' => function ($model) {
                            return ['widgetOptions' => $model->isNewRecord ? ['type' => config('article_editor_type')] : ['isMarkdown' => $model->markdown]];
                        }*/
                    ],
                ]
            ]
        ];
    }
}
