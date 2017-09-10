<?php

namespace common\modules\team\controllers;

use yii\web\Controller;

/**
 * Default controller for the `team` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest(){
        $json = ['test'=>'team project'];
        return json_encode($json);
    }

    public function actionMongo()
    {
        $collection = \Yii::$app->mongodb->getCollection ( 'customer' );
        $res = $collection->insert ( [
            'name' => 'John Smith22',
            'status' => 2
        ] );
        var_dump($res);
        return 'cc';//$this->render('index');
    }
}
