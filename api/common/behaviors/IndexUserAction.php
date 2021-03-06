<?php

namespace api\common\behaviors;

use Yii;
use yii\rest\Action;
use yii\data\ActiveDataProvider;

class IndexUserAction extends Action
{
    public $prepareDataProvider;


    /**
     * @return ActiveDataProvider
     */
    public function run()
    {
        if ($this->checkAccess) {
            call_user_func($this->checkAccess, $this->id);
        }
        return $this->prepareDataProvider();
    }

    /**
     * Prepares the data provider that should return the requested collection of the models.
     * @return ActiveDataProvider
     */
    protected function prepareDataProvider()
    {
        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = json_decode(Yii::$app->request->get('query'),true);

        /*foreach($query as $k=>$v){
            $query[$k] = json_decode($v,ture);
        }*/

        if($query == null){
            $query =[];
        }

        $query['created_by'] = Yii::$app->user->identity->id;
        //return $query;
        return Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $modelClass::find()
                ->andFilterWhere($query),
               //->andFilterWhere(['name'=>'XQ`s board333333333333'])
        ]);
    }
}
