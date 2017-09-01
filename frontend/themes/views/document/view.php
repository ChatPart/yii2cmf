<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Document */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => $cate->name, 'url' => ['document/list','cate'=>$cate->id]];
//$this->params['breadcrumbs'][] = $this->title;
function shtm($design_str)
{
    $str=$design_str; // 取得字串同时去掉头尾空格和空回车
    //$str=str_replace("<br>","",$str); // 去掉<br>标签
    //$str="<p>".$str; // 在文本头加入<p>
    $str=str_replace("\r\n","<br>",$str); // 用p标签取代换行符
    //$str.="</p>\n"; // 文本尾加入</p>
    $str=str_replace("<p></p>","",$str); // 去除空段落
    $str=str_replace("\n","",$str); // 去掉空行并连成一行
    $str=str_replace("</p>","</p>\n",$str); //整理html代码
    return $str;
}
?>
<div class="document-view container">
<div class="row">
   <!-- <div class="col-md-3">
    </div>-->
    <div class="col-md-9">
        <div class="panel panel-default ">
            <div class="panel-body ">
                <div class="col-md-12 padding-l-0">
                    <h3 class="title"><?= $model->title ?></h3>
                    <h5 class="title" style="padding-top: 12px;"><?= $model->subhead ?></h5>

                    <div class="author clearfix author-right">
                        <!--<img src="img/profileimg4.png" alt="img">-->
                        <span class="name" style="margin-right: 1em;"><?= $model->author ?> </span>
                        <span class="from"><?= Yii::$app->formatter->asDate($model->create_at, 'yyyy - M - dd') ?></span>
                    </div>
                    <hr>
                    <pre style="white-space: normal;     word-break: none;
     word-wrap: break-word;
     background: none;
     border: none;
     border-radius: none; ">
                        <?= shtm($model->content) ?>
                    </pre>



                </div>

            </div>


        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default ">



            <div class="panel-body ">
                <h5>相关</h5>
               <!-- <dl>
                    <dt>Donec lobortis justo at aliquet</dt>
                    <dd>Stra</dd>
                    <dt>Tempus imperdiet elit</dt>
                    <dd> sodales id. Donec lobortis justo at aliquet luctus. Praesent interdum massa sed ex efficitur, vitae dignissim ante pharetra</dd>
                </dl>-->


            </div>

        </div>
    </div>

</div>




</div>
