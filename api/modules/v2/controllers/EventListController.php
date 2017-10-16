<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
use yii\rest\ActiveController;

use Yii;
use yii\rest\Action;
use yii\data\ActiveDataProvider;
//use api\common\controllers\Controller;
use yii\web\NotFoundHttpException;

class EventListController extends ActiveController
{
    public $modelClass = 'common\modules\team\models\TaskList';

    public $updateScenario = TaskList::SCENARIO_UPDATE;

    public $createScenario = TaskList::SCENARIO_CREATE;

    public function actions()
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'api\common\behaviors\IndexAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        $actions['delete']=[
            'class' => 'api\common\behaviors\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        //unset($actions['update']);
        //unset($actions['view']);

        return $actions;
    }


}
