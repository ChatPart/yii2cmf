<?php

namespace common\models;

use common\behaviors\PositionBehavior;
use Yii;
use common\modules\attachment\behaviors\UploadBehavior;

/**
 * This is the model class for table "{{%nav_item}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $status
 */
class NavItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%nav_item}}';
    }

    public $linkOptions;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['status', 'nav_id', 'order', 'target','pid'], 'integer'],
            ['pid', 'default', 'value' => 0],
            [['title', 'url'], 'string', 'max' => 128],
            ['cover', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'nav_id' => Yii::t('common', 'NAV ID'),
            'title' => Yii::t('common', 'Title'),
            'url' => Yii::t('common', 'Url'),
            'target' => '是否新窗口打开',
            'status' => Yii::t('common', 'Status'),
            'order' => Yii::t('common', 'Order'),
            'cover' => Yii::t('common', '图标'),
        ];
    }

    public function attributeHints()
    {
        return [
            'url' => '格式: /site/index a=1&b=2'
        ];
    }

    public function behaviors()
    {
        return [
            'positionBehavior' => [
                'class' => PositionBehavior::className(),
                'positionAttribute' => 'order',
                'groupAttributes' => [
                    'nav_id'
                ],
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'cover',
                'entity' => __CLASS__
            ],
        ];
    }

    public function getNav()
    {
        return $this->hasOne(Nav::className(), ['id' => 'nav_id']);
    }
}
