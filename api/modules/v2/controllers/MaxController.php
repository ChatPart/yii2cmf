<?php
/**
 * Created by PhpStorm.
 * Author: yidashi
 * DateTime: 2017/3/8 14:30
 * Description:
 */

namespace api\modules\v2\controllers;


use api\common\controllers\Controller;
//use api\modules\v1\models\LoginForm;
use api\common\models\User;
use common\modules\team\models\Board;
use common\modules\team\models\Task;
use common\modules\team\models\TaskList;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class MaxController extends Controller
{
    /**
     * @api {post} /v1/auth/login 登录
     * @apiVersion 1.0.0
     * @apiName login
     * @apiGroup Auth
     *
     * @apiParam {String} username 用户名/邮箱
     * @apiParam {String} password  密码
     *
     */
    public function actionBoardother($board_id)
    {
        $board = Board::findOne($board_id);
        $task_lists = TaskList::find()->where(['board_id'=>$board_id])->all();

        $tasks = [];

        foreach ($task_lists as $k=>$taskList){
            $task = Task::find()
                ->where(['task_list_id'=>$taskList->$task_lists[$k]->_id])->asArray()
                ->all();

            $tasks[] = $task_lists[$k]->_id;
            /*if(!empty($task)){
                //$task_lists[$k]['tasks'] =$tasks;
                $task_lists[$k]->tasks=99;//$task;

            }*/

        }


        $data['board'] = $board;
        $data['task_list'] = $task_lists;
        $data['tasks'] = $tasks;

        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['created_at'],
            ],
        ]);
        //var_dump($provider);

        return $provider;
    }

    public function  actionCc()
    {

        $data = Task::find()
            ->where(['task_list_id'=>'5994511e0109b8364b6061d1'])->asArray()
            ->all();
        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['created_at'],
            ],
        ]);
        return $provider;
    }
}