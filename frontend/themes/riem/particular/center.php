<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '研究中心';
$this->params['breadcrumbs'][] = $this->title;
/*$a = Yii::$app->request->get('category');
$category = isset($a)?$a:39;*/
$positions = [];

foreach ($positions as $position) {
    $dataProvider = $searchModel->search(['position' => $position]);
    $models = $dataProvider->getModels();
    foreach ($models as $model) {

    }
}
?>

<div class="container">
    <div class=" text-center">
        <h2 class="heading">研究中心 <span class="divider-center"></span></h2>
    </div>
    <div class="row leader-block" >
        <div class="col-md-10 col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border" >
                    <div class="col-sm-2"><img class="img-responsive" src="/images/portfolio/中心logo.png" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px 5px">
                        <a href="http://chfs.swufe.edu.cn/"><h3 class=" " style="color: #16bdee; margin-top: 10px">中国家庭金融调查与研究中心</h3></a>
                        <p class="">  中国家庭金融调查与研究中心是西南财经大学于2010年成立的集数据采集与数据研究于一身的公益性学术调研机构，包含中国家庭、小微企业和城乡社区治理三大数据库，同时，中国家庭金融调查与研究中心是“高等学校学科创新引智计划”（简称“111计划”）的文社科类创新引智基地之一。</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img2.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">西方经济与公共政策研究所</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img3.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">资本市场研究中心</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img4.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">中国金融风险研究中心</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img5.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">公共经济与行为研究中心</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img6.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">收入分配与发展政策研究中心</h3>

                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10  col-md-offset-1 col-sm-3 ">
            <div class="box box-solid" style="padding:15px">
                <div class="box-body with-border">
                    <div class="col-sm-2"><img class="img-responsive " src="/images/portfolio/img7.jpg" alt="Photo"></div>
                    <div class="col-sm-9" style="padding:0px  5px">
                        <h3 class=" " style="color: #16bdee;margin-top: 10px">国际财会与审计研究中心</h3>
                        <p class="">  ………………………………</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

