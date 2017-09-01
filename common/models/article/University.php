<?php

namespace common\models\article;

use common\models\Article;
use common\models\behaviors\SchoolCategoryBehavior;
use common\models\Category;
use Yii;
use yii\helpers\Url;
use common\behaviors\DynamicFormBehavior;
use yii\db\ActiveRecord;
use common\modules\attachment\behaviors\UploadBehavior;
use common\modules\attachment\models\Attachment;
use common\traits\EntityTrait;

/**
 * This is the model class for table "university".
 *
 * @property integer $id
 * @property integer $category
 * @property string $name
 * @property string $school_logo
 * @property string $pic
 * @property string $en_name
 * @property string $info
 * @property string $website
 * @property string $location
 * @property string $project
 */
class University extends \yii\db\ActiveRecord
{
    use EntityTrait;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_university}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name' ], 'required'],
            [[ 'info', 'website', 'location','en_name','project'], 'string'],
            [['category'], 'integer'],
            [['name'], 'string', 'max' => 255],
            ['school_logo', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            'id' => Yii::t('osec', 'ID'),
            'name' => Yii::t('osec', 'name'),
            'school_logo' => Yii::t('osec', 'logo'),
            'pic' => Yii::t('osec', 'pic'),
            'en_name' => Yii::t('osec', 'English name'),
            'info' => Yii::t('osec', '简介'),
            'website' => Yii::t('osec', '官网'),
            'location' => Yii::t('osec', 'location'),
            'project' => Yii::t('osec', 'project'),
        ];
    }*/

    public function behaviors()
    {
        return [
            [
                'class' => SchoolCategoryBehavior::className(),
                'school'=>$this,
                /*'multiple' => true,
                'attribute' => 'school_logo',
                'entity' => __CLASS__*/
            ],
            [
                'class' => UploadBehavior::className(),
                'multiple' => true,
                'attribute' => 'school_logo',
                'entity' => __CLASS__
            ],
            [
                'class' => DynamicFormBehavior::className(),
                'formAttributes' => [
                    'info' => [
                        'type' => 'editor',
                    ],
                    'name' => 'text',
                    'en_name' => 'text',
                    'website' => 'text',
                    //'school_logo' => 'images',
                    'school_logo' => [
                        'type' => 'images',
                        'options' => ['widgetOptions' => ['onlyUrl' => false]]
                    ],
                    //'subject' => 'text',

                ]
            ]
        ];
    }


    public function findAritcle(){
        return Article::findOne(['id'=>$this->id]);
    }

    public function getCategorys(){
        return Article::findAll(['category'=>$this->findAritcle()->title]);

    }



}
