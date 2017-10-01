<?php

namespace backend\controllers;

use common\models\AdminLog;
use common\models\Article;
use common\models\article\Base;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * AdminLogController implements the CRUD actions for AdminLog model.
 */
class ToolController extends Controller
{


    /**
     * Lists all AdminLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $posts = \Yii::$app->db->createCommand('SELECT * FROM cate WHERE pre_cate = 52')
            ->queryAll();

//        [['pid', 'sort', 'allow_publish'], 'integer'],
//            ['pid', 'default', 'value' => 0],
//            [['sort'], 'default', 'value' => 0]

        foreach ($posts as $cate){

            $category = new Category();
            $category->title =$cate['name'];
            $category->module = ['base'];
            $category->pid = 0;
            $category->allow_publish = 1;
            $category->sort = 1;

                if(($cate['type'] == 1||$cate['type'] == 2) && $category->save()){
                    echo $category->title;
                    echo '<br>';
                }


            $subPosts = \Yii::$app->db->createCommand('SELECT * FROM cate WHERE pre_cate ='.$cate['id'])
                ->queryAll();

            foreach ($subPosts as $subCate){
                $subCategory = new Category();
                $subCategory->title = $subCate['name'];
                $subCategory->module = ['base'];
                $subCategory->pid = $category->id;
                $subCategory->allow_publish = 1;
                $subCategory->sort = 1;

                if(($cate['type'] == 1||$cate['type'] == 2) && $subCategory->save()){
                    echo $subCategory->title ;
                    echo '<br>';
                }
            }

        }

    }

    public function actionDocument()
    {
        $posts = \Yii::$app->db->createCommand('SELECT * FROM cate')
            ->queryAll();

        $i=0;

        foreach ($posts as $cate){

            $documents = \Yii::$app->db->createCommand('SELECT * FROM document WHERE cate ='.$cate['id'])
                ->queryAll();
            foreach ($documents as $document){

                $category = Category::findOne(['title'=>$cate['name']]);

                if(empty($category)){
                    $category_id = 20;
                }else{
                    $category_id = $category->id;
                }

                $article = new Article();
                $article->title = $document['title'];
                $article->category_id = $category_id;
                $article->status = 1;
                $article->published_at = (int)$document['create_at'];
                $article->created_at = (int)$document['create_at'];
                $article->module = 'base';
                $article->description = $document['breviary'];

                if($article->save()){

                    echo $i++;
                    echo $cate['name'].':';
                    echo $article->title;
                    echo '<br>';

                    $base = new Base();
                    $base->id = $article->id;
                    $base->content = $document['content'];
                    $base->author = $document['author'];
                    if($base->save()){
                        echo 'SUCCESS';
                        echo '<br>';
                    }else{
                        echo 'fail';
                        echo '<br>';
                    }

                }else{
                    echo $cate['name'].':';
                    echo $article->title;
                    echo '<br>';
                    echo 'fail';
                    echo '<br>';
                }





                //$article->category_id = $document['title'];
            }

        }

    }

    /**
     * Displays a single AdminLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the AdminLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
