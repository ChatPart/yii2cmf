<?php

namespace api\modules\v2\controllers;

use common\modules\team\models\TaskList;
use yii\rest\ActiveController;

use Yii;
use yii\rest\Action;
use yii\data\ActiveDataProvider;
//use api\common\controllers\Controller;
use yii\web\NotFoundHttpException;

class TaskListController extends ActiveController
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
        /*$actions['update'] = [
            'class' => 'api\common\behaviors\UpdateAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];*/
        //unset($actions['update']);
        //unset($actions['view']);

        return $actions;
    }

//    public function actionUpdate()
//    {
//        return Yii::createObject([
//            'class' => ActiveDataProvider::className(),
//            'query' => $this->modelClass::find()
//                ->andFilterWhere(['_id'=>'5991524c9022a109ed7d6653']),
//        ]);
//    }

   /* public function actionView($id){
        return Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $this->modelClass::find()
                ->andFilterWhere(['_id'=>'5991524c9022a109ed7d6653']),
        ]);
    }*/

    /*public function actionView($id)
    {
        //$query = json_decode(Yii::$app->request->get('query'),true);

        //request()->setQueryParams(['expand'=>'data']);
        $model = $this->modelClass::find()->where(['_id' => $id])->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        //$model->addView();
        return $model;
    }*/

    /*public function checkAccess($action, $model = null, $params = [])
    {
        switch ($action){
            case 'create':$model->scenario = TaskList::SCENARIO_CREATE;break;
            case 'update':$model->scenario = TaskList::SCENARIO_UPDATE;break;
        }

    }*/

}
