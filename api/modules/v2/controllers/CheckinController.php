<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\Board;
use common\modules\team\models\Task;
use common\modules\team\models\TaskList;
use yii\data\ArrayDataProvider;
use yii\rest\ActiveController;
//use api\common\controllers\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;

class CheckinController extends ActiveController
{
    public $modelClass = 'common\modules\team\models\Checkin';

    /*public $updateScenario = TaskList::SCENARIO_UPDATE;

    public $createScenario = TaskList::SCENARIO_CREATE;*/
    /*public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => QueryParamAuth::className(),
                'tokenParam' => 'access_token',
            ]
        ]);
    }*/

    public function actions()
    {
        $actions = parent::actions();
        /*$actions['index']=[
            'class' => 'api\common\behaviors\IndexUserAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];*/

        /*$actions['delete']=[
            'class' => 'api\common\behaviors\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];*/

        //unset($actions['index']);
        return $actions;
    }


    public function extraFields()
    {

        return ['events'=>function(){
            return ['1',2,3];
        },];
    }




}
