<?php
/**
 * Created by PhpStorm.
 * User: xq
 * Date: 16-6-17
 * Time: 上午10:13
 */
use yii\helpers\Url;
//use Yii;
?>
<div class="box <?=$css['warper']?>">
    <a href="<?= $url ?>" class="uppercase">
        <div class="box-header with-border index-box-header bgimg-title3">
            <h4 class="box-title "></h4>
            <div class="box-tools pull-right">
                <!--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>-->
                <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>-->
                <!--<button type="button" class="btn btn-box-tool"  title="" >
                    <i class="fa fa-comments"></i>更多</button>-->
            </div>
        </div>
    </a>
    <div class="box-body <?=$css['body']?>">
        <ul class="products-list product-list-in-box">
            <?php foreach ( $ac as $m):?>
            <li class="item">
                <div class="product-img">
                    <img src="<?=$m->cover?>" alt="<?=$m->title?>">
                </div>
                <div class="product-info">
                    <a href="<?=Url::to(['article/view','id'=>$m->id])?>" class="product-title">
                        <?=$m->title?>
                        <!--<span class=" pull-left">800</span>--></a>
                        <span class="product-description">
                          <?=$m->description?>
                        </span>
                </div>
            </li>
            <?php endforeach; ?>
            <!-- /.item -->

        </ul>

    </div>

    <!-- /.box-body -->
</div>
