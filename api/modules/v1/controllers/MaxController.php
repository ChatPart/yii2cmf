<?php
/**
 * Created by PhpStorm.
 * Author: yidashi
 * DateTime: 2017/3/8 14:30
 * Description:
 */

namespace api\modules\v1\controllers;


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

    /** 当前看板下所有任务列表，及其所有任务
     * @param $id
     * @return ArrayDataProvider
     */
    public function actionBoard($id)
    {
        $board = Board::findOne($id);
        $task_lists = TaskList::find()->where(['board_id'=>$id])->asArray()->all();

        $tasks=[];
        foreach ($task_lists as $k =>$taskList){
            $task_lists[$k]['_id'] = (string)$task_lists[$k]['_id'];

            $cur_tasks = @Task::find()
                ->where(['task_list_id'=>(string)$taskList['_id']])
                ->all();

            //$cur_tasks['task_list_id'] = (string)$taskList['_id'];


            foreach ($cur_tasks as $task){
                $task_lists[$k]['task'][] = (string)$task['_id'];
            }
            $tasks[(string)$taskList['_id']] = $cur_tasks;

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

        return $provider;
    }

    /** 任务列表下所有任务
     * @param $task_list_id
     * @return ActiveDataProvider
     */
    public function  actionTasks($task_list_id)
    {
        $query = Task::find()
            ->andFilterWhere(['task_list_id' => $task_list_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    '_id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }

    /** 任务列表下所有任务
     * @param $task_list_id
     * @return ActiveDataProvider
     */
    public function  actionEvents($event_list_id)
    {
        $query = Task::find()
            ->andFilterWhere(['task_list_id' => $event_list_id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    '_id' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }
}