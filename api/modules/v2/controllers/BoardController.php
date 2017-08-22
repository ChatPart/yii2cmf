<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
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

        $actions['delete']=[
            'class' => 'api\common\behaviors\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        //unset($actions['index']);
        return $actions;
    }

    public function actionCreate(){
        $post = \Yii::$app->getRequest()->getBodyParams();


        $model = $this->modelClass::findOne(json_decode($post));

        //$model = $modelClass::findOne(array_combine($keys, $values));

        /*if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id, $model);
        }*/

        return $model;
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


}
