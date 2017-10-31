<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
use yii\rest\ActiveController;
//use api\common\controllers\Controller;

class EventController extends ActiveController
{
    public $modelClass = 'common\modules\team\models\Task';
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['POST'],
            'delete' => ['DELETE'],
        ];
    }
    public function actions()
    {
        $actions = parent::actions();
        $actions['index']=[
            'class' => 'api\common\behaviors\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        $actions['update']=[
            'class' => 'api\common\behaviors\UpdateAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        $actions['delete']=[
            'class' => 'api\common\behaviors\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        //unset($actions['index']);
        return $actions;
    }
    /*public $updateScenario = TaskList::SCENARIO_UPDATE;

    public $createScenario = TaskList::SCENARIO_CREATE;*/



}
