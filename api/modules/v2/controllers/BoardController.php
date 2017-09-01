<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\Board;
use common\modules\team\models\Task;
use common\modules\team\models\TaskList;
use yii\data\ArrayDataProvider;
use yii\rest\ActiveController;
//use api\common\controllers\Controller;
use yii\data\ActiveDataProvider;

class BoardController extends ActiveController
{
    public $modelClass = 'common\modules\team\models\Board';

    /*public $updateScenario = TaskList::SCENARIO_UPDATE;

    public $createScenario = TaskList::SCENARIO_CREATE;*/

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']=[
            'class' => 'api\common\behaviors\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];

        /*$actions['delete']=[
            'class' => 'api\common\behaviors\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];*/
        //unset($actions['index']);
        return $actions;
    }


    public function actionIndex($query = null)
    {
        $command = json_decode($query,true);
        if($command == null){
            $command =[];
        }

        $myQuery = $this->modelClass::find()
            ->andFilterWhere($command);


        $dataProvider = new ActiveDataProvider([
            'query' => $myQuery,
            'sort' => [
                'defaultOrder' => [
                    '_id' => SORT_DESC
                ]
            ]
        ]);

        return $dataProvider;
    }
    public function actionBoardother($board_id)
    {
        /*$command = json_decode($query,true);
        if($command == null){
            $command =[];
        }*/

        //$board = Board::findOne($board_id);
            //->andFilterWhere($command);

        $task_listQuery = TaskList::find()
            ->andFilterWhere(['board_id'=>$board_id]);

        /*$task_lists = new ActiveDataProvider([
            'query' => $task_listQuery,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_ASC
                ]
            ]
        ]);*/
        $task_lists = TaskList::find()->where(['board_id'=>$board_id])->all();

        //$tasks = [];

        foreach ($task_lists as $taskList){
            $task_lists['task'] = Task::find()->where(['task_list_id'=>$taskList->id])->all();
        }

        $provider = new ArrayDataProvider([
            'allModels' => $task_lists,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['created_at'],
            ],
        ]);
        //var_dump($provider);
        $myQuery = $this->modelClass::find()
            ->andFilterWhere(['board_id'=>$board_id]);


        $dataProvider = new ActiveDataProvider([
            'query' => $myQuery,
            'sort' => [
                'defaultOrder' => [
                    '_id' => SORT_DESC
                ]
            ]
        ]);
        return $dataProvider;
    }


}
