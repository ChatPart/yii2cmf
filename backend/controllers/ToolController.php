<?php

namespace backend\controllers;

use common\models\AdminLog;
use common\models\Article;
use common\models\article\Base;
use common\models\Category;
use common\modules\attachment\models\Attachment;
use common\modules\attachment\models\AttachmentIndex;
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
        $posts = \Yii::$app->db->createCommand('SELECT * FROM cate WHERE pre_cate > 4 and  pre_cate <> 0 and')
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
            $category = Category::findOne(['title'=>$cate['name']]);

            foreach ($documents as $document){

                if(empty($category)){
                    $category_id = 20;
                }else{
                    $category_id = $category->id;
                }

                $article = new Article();
                $article->title = $document['title'];
                $article->category_id = $category_id;
                $article->status = 1;
                $article->published_at = $document['create_at'];
                $article->created_at = $document['create_at'];
                $article->module = 'base';
                $article->description = $document['breviary'];

                $classname = Article::className();

                if($article->save()){
//*********图片 ×××××××××*******/
                    if(!empty($document['pic'])){
                        $a = explode('.',$document['pic']);
                        $b = explode($a[0],'/');

                        $attachment = new Attachment();
                        $attachment->path = $a[0];
                        $attachment->name = $b[count($b)-1].$a[1];
                        $attachment->extension = $a[1];
                        $attachment->type = 'image/'.$a[1];
                        $attachment->size = 1;
                        $attachment->hash = $b[count($b)-1];
                        if($attachment->save()){
                            //$attachment = Attachment::uploadFromUrl('','http://10.8.100.55/'.$document['pic'])[0];
                            $ai = new AttachmentIndex();
                            $ai->attachment_id = $attachment->id;
                            $ai->entity_id = $article->id;
                            $ai->attribute = 'cover';
                            $ai->entity = $classname;
                            $ai->save();
                        }

                    }




                    echo $i++; //统计分类文章数量
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

    //public function actionTestA()

    public function actionAttachment(){


        $re = Attachment::uploadFromUrl('','http://10.8.100.55/images/upload/20170614/1497420748393603.png');
        //$attachment = Attachment::uploadFromUrl('','http://10.8.100.55/'.$document['pic'])[0];
        var_dump($re->errors);die();
        $ai = new AttachmentIndex();
        $ai->attachment_id = $re->id;
        $ai->entity_id = 1;
        $ai->attribute = 'cover';
        $ai->entity = Article::className();
        $ai->save();

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
