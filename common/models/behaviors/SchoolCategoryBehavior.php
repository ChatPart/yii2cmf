<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/6/29
 * Time: 下午4:17
 */

namespace common\models\behaviors;


use common\models\Article;
use common\models\NavItem;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use common\models\Category;
use yii\db\Exception;

class SchoolCategoryBehavior extends Behavior
{
    public $school;
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => [$this, 'addCategory'],
            //ActiveRecord::EVENT_AFTER_UPDATE => [$this, 'addCategory'],
        ];
    }

   /* public function addCategory($event)
    {
        // 如果修改了分类名,更新文章表分类名冗余字段
        $changedAttributes = $event->changedAttributes;
        if (isset($changedAttributes['title'])) {
            Article::updateAll(['category' => $event->sender->title], ['category_id' => $event->sender->id]);
        }
    }*/
    public function addCategory($event){
        //echo 'cc';die();
        $category = new Category();
        try{
            $article = $this->school->findAritcle();
            //var_dump($this->school);die();$this->findAritcle()->title;
            $category->title = $article->title;//$this->findAritcle()->title;
            $category->pid = (int)\Yii::$app->config->get('school')['id'];//Category::findOne(['title'=>''])
            $category->module = ['base'];


            if($category->save()){
                $navItem = new  NavItem();
                $navItem->nav_id = 1;
                $navItem->title =$category->title;
                $navItem->url = '/?r=article%2Fview&id='.$article->id;
                $navItem->status = 1;
                $navItem->pid = 4;
                $navItem->target = 1;
                $navItem->save();
                //$this->school->category = $category->id; //关联外键
                //$this->school->save();
            }



            if($category->hasErrors()) {
                echo \Yii::$app->config->get('school')['id'];
                //var_dump($category->errors);die();
                throw new Exception('操作失败');
            }
        }catch (\Exception $e) {

            //$transaction->rollBack();
            \Yii::$app->session->setFlash('error', $e->getMessage());
            var_dump($e);die();
        }




    }
}