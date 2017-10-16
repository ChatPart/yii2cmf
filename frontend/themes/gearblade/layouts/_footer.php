<?php
use yii\helpers\Url;

?>
<!-- Footer Main -->
<footer id="footer-main" class="footer-main footer-main-1 container-fluid no-left-padding no-right-padding">
    <!-- Container -->
    <div class="container">
        <!-- Row -->
        <div class="row">
            <!-- Widget About -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <aside class="widget widget_about">
                    <h3 class="widget-title">关于我们</h3>
                    <p>成都归锋科技有限责任公司是一家新兴的技术创业公司。 专注于互联网应用软件开发，以技术提升驱动服务升级。旨在为客户提供最先进的技术开发服务，互联网+解决方案。</p>
                </aside>
                <div class="social-copy-widget">
                    <ul class="footer-social">
                        <li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" title="Twiiter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                    <div class="copyright">
                        <p>&copy; <?= Yii::$app->config->get('SITE_NAME').' '.date('Y') ?></p>
                        <p><?= Yii::$app->config->get('SITE_ICP')?></p>
                    </div>
                </div>
            </div><!-- Widget About /- -->

            <!-- Widget Newsletter -->
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-6">
                        <aside class="widget widget_everywhere">
                            <h3 class="widget-title">联系方式</h3>
                            <div class="cnt-detail">
                                <p><i class="icon icon-Phone2"></i><a href="tel:+011234567890">18482187430 </a></p>
                                <p><i class="icon icon-Mail"></i><a href="mailto:info@maxseo.com">zxq@gearblade.com</a></p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-6">
                        <aside class="widget widget_newsletter">
                            <h3 class="widget-title">Our NewsLetter</h3>
                            <form>
                                <input type="text" required="" placeholder="Enter Your Email..." class="form-control">
                                <input type="submit" title="SUBSCRIBE" value="SUBSCRIBE">
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- Widget Newsletter /- -->
            <!-- Widget Links -->
            <div class="col-md-4 col-sm-6 col-xs-6">
                <aside class="widget widget_links">
                    <h3 class="widget-title">相关链接</h3>
                    <ul>
                        <?php foreach(\common\models\Nav::getItems('footer') as $v): ?>
                            <li>
                                <a href="<?= Url::to($v['url']) ?>" target="_blank" title="<?= $v['label'] ?>">
                                    <?= $v['label'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li><a href="#" title="SEO Analysis">SEO Analysis</a></li>
                        <li><a href="#" title="Mobile Application">Mobile Application</a></li>
                    </ul>
                </aside>
            </div><!-- Widget Links /- -->
        </div>
        <!-- Row /- -->
    </div>
    <!-- Container /- -->
</footer>
<!-- Footer Main /- -->
