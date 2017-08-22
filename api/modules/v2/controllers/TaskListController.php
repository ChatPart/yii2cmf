<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
use yii\rest\ActiveController;
//use api\common\controllers\Controller;

class TaskListController extends ActiveController
{
    public $modelClass = 'common\modules\team\models\TaskList';

    public $updateScenario = TaskList::SCENARIO_UPDATE;

    public $createScenario = TaskList::SCENARIO_CREATE;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']=[
            'class' => 'api\common\behaviors\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        //unset($actions['index']);
        return $actions;
    }
    /*public function actionIndex()
    {
        return $this->render('index');
    }*/

    /*public function checkAccess($action, $model = null, $params = [])
    {
        switch ($action){
            case 'create':$model->scenario = TaskList::SCENARIO_CREATE;break;
            case 'update':$model->scenario = TaskList::SCENARIO_UPDATE;break;
        }

    }*/

}
