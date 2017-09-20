<?php

namespace frontend\controllers;

use common\models\Category;
use frontend\models\Article;
use frontend\models\Tag;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Site controller.
 */
class ChatController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['sitemap'],
                'duration' => 60 * 60,
                'variations' => [
                    \Yii::$app->language,
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()->published(),
            'sort' => [
                'defaultOrder' => [
                    'is_top' => SORT_DESC,
                    'published_at' => SORT_DESC
                ]
            ]
        ]);
        $categories = Category::find()->all();
        $hotTags = Tag::hot();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'categories' => $categories,
            'hotTags' => $hotTags
        ]);
    }

    public function actionWs()
    {
       $this->layout = false;
        return $this->render('ws');
    }

    public function actionChat(){
        $this->layout = false;
        $uid = Yii::$app->user->id;
        $token = Yii::$app->request->csrfToken;
        return $this->render('main/main', [
            'uid' => $uid,
            'token' => $token,
            'static_url' => '/chat/',
            'app_host'=>$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']
        ]);
    }
}
