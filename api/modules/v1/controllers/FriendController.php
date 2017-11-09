<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 2017/3/8
 * Time: 下午11:19
 */

namespace api\modules\v1\controllers;


use api\common\controllers\Controller;
use api\modules\v1\models\Comment;
//use common\modules\user\models\User;
use yii\data\ActiveDataProvider;
use common\models\Friend;
use api\common\models\User;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;

class FriendController extends Controller
{
    const TYPE_bilateral = 1;
    const TYPE_unilateral = 2;

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => QueryParamAuth::className(),
                'tokenParam' => 'access_token',
            ]
        ]);
    }

    /**
     * @api {get} /v1/comments 评论列表
     * @apiVersion 1.0.0
     * @apiName index
     * @apiGroup Comment
     *
     * @apiParam {Integer} entity_id 实体ID.
     * @apiParam {String} entity  实体
     *
     */
    public function actionIndex()
    {
        $friends = Friend::find()->select(['friend_id'])->where([
            'type' => self::TYPE_bilateral,
            'owner_id' => \Yii::$app->user->identity,
            'status' => 1
        ])->asArray()->all();

        /*foreach ($friends as $friend) {
            User::findOne(['id'=>$friends['id']]);
        }*/
        $users = User::find()->select(['id', 'username','email'])->where(
            //'id'=>3
            //['in','id',array_column($friends, 'friend_id')]
            ['in','id',array_column($friends, 'friend_id')]
        );

        //var_dump($users);die();
        /*$provider = new ArrayDataProvider([
            'allModels' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['created_at'],
            ],
        ]);*/
        //return $users;

        return new ActiveDataProvider([
            'query' => $users,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    //'created_at' => SORT_DESC
                ]
            ]
        ]);
    }

    public function actionFollow($id)
    {
        \Yii::$app->response->format = 'json';
        $model = new Friend();
        if ($model->isFollow($id)) {
            $model->cancelFollow($id);
            return [
                'message' => '已取消'
            ];
        } else {
            $model->follow($id);
            return [
                'message' => '已关注'
            ];
        }
    }

}