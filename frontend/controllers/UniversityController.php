<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\Cate;
use Yii;
//use osec\models\University;
//use osec\models\search\UniversitySearch;
use yii\base\ErrorException;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversityController implements the CRUD actions for University model.
 */
class UniversityController extends Controller
{
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => Yii::getAlias('@web')."/images/upload/{yyyy}{mm}{dd}/{time}{rand:6}",
                    //'imagePathFormat' => "/images/upload/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/images/upload/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                    "imageRoot" => Yii::getAlias("@webroot"),
                ]
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionDocument($article_id){
        //$university = $this->findModel($id);
        $article = Article::findOne(['id' =>$article_id]);
        if(isset($article->data->processedContent)){
            $document = \yii\helpers\HtmlPurifier::process($article->data->processedContent) ;
            $title = $article->title;
        }else{
            $title = '学校简介';
            $document = \yii\helpers\HtmlPurifier::process($article->data->info) ;

        }

        return json_encode(['title'=>$title,'content'=>$document]);
    }


    /**
     * Finds the University model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return University the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = University::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
