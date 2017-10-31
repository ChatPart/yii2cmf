<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
use yii\rest\ActiveController;
//use api\common\controllers\Controller;

class FriendController extends ActiveController
{
    public $modelClass = 'common\models\Friend';

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']=[
            'class' => 'api\common\behaviors\IndexAction',
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
