<?php

namespace common\modules\staff\backend\controllers;

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
        $this->layout = 'main_nav';
        return $this->render('leader', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);

    }
    public function actionAssistant($sort='name')
    {
        $this->layout = 'main_nav';
        $searchModel = new StaffSearch(['type'=>'办公室工作人员']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams+['sort'=>'name']);

        return $this->render('assistant', [
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
        $this->layout = 'main_nav';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Staff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Yii::createObject([
                'class'    => \common\modules\user\models\User::className(),
                'scenario' => 'create',
            ]);

            $user->email = trim($model->public_email);
            $user->username = trim($model->name);
            $user->password = trim($model->public_email);
            if ($user->create()) {  //创建用户
                $auth = \Yii::$app->authManager;

                if($model->type == '全职教师' || $model->type == '客座教授' || $model->type == '兼职教授' ){


                    $role = $auth->createRole('教师'); //赋予教师权限
                    $auth->assign($role, $user->id);


                }elseif($model->type == '办公室工作人员'){

                    $role = $auth->createRole('办公室工作人员');  //赋予办公室工作人员权限

                    $auth->assign($role, $user->id);

                }

                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been created'));

                return $this->redirect(['update', 'id' => $model->id]);

            }else{


                return $this->render('create', [
                    'model' => $model,
                ]);

            }
        } else { //var_dump($model->errors);die();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionAuth()
    {
        die('喵');
        $model = new User();

        $d = $model->find()->all();

        foreach ($d as $k=>$v){
            $staff = Staff::findOne(['name'=>$v->username]);
            $auth = \Yii::$app->authManager;
            if(!empty($staff)){
                if($staff->type == '全职教师' || $staff->type == '客座教授' || $staff->type == '兼职教授' ){


                    $role = $auth->createRole('教师'); //赋予教师权限



                }elseif($staff->type == '办公室工作人员'){

                    $role = $auth->createRole('办公室工作人员');  //赋予办公室工作人员权限


                }else{
                    $role = $auth->createRole('tes1');  //赋予办公室工作人员权限

                }
            }else{
                $role = $auth->createRole('tes1');
            }

           // $role = $auth->createRole('教师');

            if($auth->assign($role, $v->id)){
                echo 'succuess';
                echo $v->id;

            }else{

                echo 'fail';
                echo $v->id;

            }

            echo '<br>';
        }


    }
    public function actionDate()
    {
        die('喵');
        $model = new Staff();

        $d = $model->find()->where('id <= 44')->all();
        //$models = Staff::findAll()->where('id <= 44');
        //var_dump($d);
        foreach ($d as $k=>$v){

           /* echo $v->name;
            echo $v->public_email;*/
            //var_dump($v->name);

            echo '(cc)';
            //var_dump($k);
            $user = Yii::createObject([
                'class'    => User::className(),
                'scenario' => 'create',
            ]);

            $user->email = trim($v->public_email);
            $user->username = trim($v->name);
            $user->password = trim($v->public_email);
            var_dump($user->username );
            if($user->create()){
                echo 'succuess';
            }else{
                var_dump($user->errors);
                echo 'fail';
            }
            echo '<br>';

        }

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $user = Yii::createObject([
                'class'    => User::className(),
                'scenario' => 'create',
            ]);

            $user->email = $model->public_email;
            $user->username = $model->name;
            $user->password = $model->public_email;
            if ($user->create()) {  //创建用户
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been created'));

                return $this->redirect(['update', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);

            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }
public function actionChart(){
    die('喵');
    $staffs =new Staff();
    $staffs = $staffs->find()->all();
    //$staffs = Staff::findAll(['status'=>23]);
    //var_dump($staffs);
    foreach ($staffs as $staff){

        $staff->name = trim($staff->name);
        $staff->gbkchart = $staff->getFirstCharter($staff->name);
        echo $staff->id;
        if($staff->save()){

            echo 'success';
        }else{
            echo 'fail';
        }
        echo '<br>';
    }
    return true;
}
    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id=null)
    {
        if($id == null){
            $staff = Staff::findOne(['public_email'=>Yii::$app->user->identity->email]);
            if($staff==null){
                return $this->redirect('/user/settings/profile');
            }
            $id = $staff->id;
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/staff/view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
