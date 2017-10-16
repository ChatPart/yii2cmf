<?php
/**
 * Created by PhpStorm.
 * Author: yidashi
 * DateTime: 2017/3/8 10:09
 * Description:
 */

namespace api\modules\v1\controllers;


use api\common\controllers\Controller;
use api\common\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;

class UserController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => QueryParamAuth::className(),
                'tokenParam' => 'access_token',
            ]
        ]);
    }

    public function actionInfo()
    {

        $user = \Yii::$app->user->identity;

        return $user;
    }

    public function actionStaffInfo()
    {
        $user = \Yii::$app->user->identity->profile;
        return $user;
    }

    public function actionBase($id){
        return User::findOne(['id'=>$id]);
    }
}