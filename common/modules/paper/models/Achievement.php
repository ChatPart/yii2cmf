<?php

namespace common\modules\paper\models;

use Yii;

/**
 * This is the model class for table "achievement".
 *
 * @property integer $id
 * @property string $author
 * @property string $title
 * @property string $periodical
 * @property string $year
 * @property string $year_id
 * @property string $address
 * @property string $serial_number
 * @property string $ei
 * @property string $hint
 */
class Achievement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achievement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'title', 'year_id','periodical'  ], 'required'],
            [['cate'], 'integer'],
            [['title', 'serial_number', 'ei', 'hint','year_id'], 'string'],
            [['publish_at'], 'safe'],
            [['author',  'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'author' => Yii::t('common', '作者'),
            'title' => Yii::t('common', '标题'),
            'periodical' => Yii::t('common', '期刊'),
            'year_id' => Yii::t('common', 'Year Id'),
            'address' => Yii::t('common', 'Address'),
            'serial_number' => Yii::t('common', '编号'),
            'ei' => Yii::t('common', 'Ei'),
            'hint' => Yii::t('common', '备注'),
            'publish_at' => Yii::t('common', '发表时间'),
        ];
    }
    public function create(){
        //$year_id = self::find()->where(['year'=>date('Y')])->count();
        //$this->year_id = $year_id +1;

        return $this->save();
    }
}
