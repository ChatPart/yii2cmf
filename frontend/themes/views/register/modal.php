<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: xq
 * Date: 16-9-2
 * Time: 下午6:01
 */
/*echo Html::a('创建', '#', [
    'id' => 'create',
    'data-toggle' => 'modal',
    'data-target' => '#success-modal',
    'class' => 'btn btn-success',
]);*/


$this->registerJs("
$('#register-modal').show();
",\yii\web\View::POS_READY);
?>

<div class="example-modal">
    <div class="modal in" id="register-modal" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">您的账户已创建</h4>
                </div>
                <div class="modal-body">
                    <p>设置收货地址</p>
                </div>
                <div class="modal-footer">
                    <a href="/user/settings/profile" type="button" class="btn btn-primary pull-left" data-dismiss="modal">设置信息</a>
                    <a href="/" type="button" class="btn btn-default ">返回</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
