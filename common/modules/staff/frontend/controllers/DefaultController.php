<?php

namespace common\modules\staff\frontend\controllers;

use dektrium\user\models\User;
use Yii;
use common\modules\staff\models\Staff;
use common\modules\staff\models\StaffSearch;
use yii\validators\SafeValidator;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/images/upload/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }
    /**
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionLeader(){
        //$searchModel = new StaffSearch(['type'=>'办公室工作人员']);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$this->layout = 'main_nav';
        return $this->render('leader', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);

    }
    public function actionAssistant($sort='name')
    {
        $searchModel = new StaffSearch(['type'=>'办公室工作人员']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams+['sort'=>'name']);

        return $this->render('assistant', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionStaff()
    {
        /*$sort = new Sort([
            'attributes' => [
                'name' => [
                    'asc' => ['CONVERT(name USING gbk)' => SORT_ASC, 'level'=>SORT_ASC],
                    'desc' => ['CONVERT(name USING gbk)' => SORT_DESC, 'level'=>SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Name',
                ],
            ],
        ]);*/

        //$searchModel = new StaffSearch(['type'=>'全职教师']);
        $searchModel = new StaffSearch();

        //$searchModel->query ->orderBy($sort->orders);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->sort = $sort;

        return $this->render('staff', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Staff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$this->layout = 'main_nav';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionOffice(){

        return $this->render('office', []);
    }
    public function actionCenter(){

        return $this->render('center', []);
    }


    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
