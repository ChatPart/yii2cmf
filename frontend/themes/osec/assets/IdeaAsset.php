<?php
namespace frontend\themes\osec\assets;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class IdeaAsset extends BaseAdminLteAsset
{
    //public $sourcePath = '@app/web/adminlte/dist';
    public $basePath = '@webroot/osec/ic';
    public $baseUrl = '@web/osec/ic';
    /*
     * <link href="css/animations.css" rel="stylesheet">
		<link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- iDea core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
		<link href="css/skins/red.css" rel="stylesheet">

		<!-- Custom css -->
		<link href="css/custom.css" rel="stylesheet">


		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Fontello CSS -->
		<link href="fonts/fontello/css/fontello.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
		<link href="plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet">
		<link href="plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="css/animations.css" rel="stylesheet">
		<link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

		<!-- iDea core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Color Scheme (In order to change the color scheme, replace the red.css with the color scheme that you prefer)-->
		<link href="css/skins/green.css" rel="stylesheet">

		<!-- Custom css -->
		<link href="css/custom.css" rel="stylesheet">

     */
    public $css = [
        /*'plugins/rs-plugin/css/extralayers.css',
        'plugins/rs-plugin/css/settings.css',
        */
        'plugins/magnific-popup/magnific-popup.css',
        'css/animations.css',
        'fonts/font-awesome/css/font-awesome.css',
        'fonts/fontello/css/fontello.css',
        'css/style.css',
        'plugins/owl-carousel/owl.carousel.css',
       // 'css/nav.css',
        'css/custom.css',
    ];
    /*
     * <script type="text/javascript" src="plugins/jquery.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>

		<!-- Owl carousel javascript -->
		<script type="text/javascript" src="plugins/owl-carousel/owl.carousel.js"></script>

		<!-- Magnific Popup javascript -->
		<script type="text/javascript" src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Sharrre javascript -->
		<script type="text/javascript" src="plugins/jquery.sharrre.js"></script>

		<!-- Count To javascript -->
		<script type="text/javascript" src="plugins/jquery.countTo.js"></script>

		<!-- Parallax javascript -->
		<script src="plugins/jquery.parallax-1.1.3.js"></script>

		<!-- Contact form -->
		<script src="plugins/jquery.validate.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>

     */
    public $js = [
        'plugins/modernizr.js',
        'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
        'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'plugins/isotope/isotope.pkgd.min.js',

        'plugins/owl-carousel/owl.carousel.js',
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
        'plugins/jquery.appear.js',
        'plugins/jquery.sharrre.js',
        'plugins/jquery.countTo.js',
        'plugins/jquery.parallax-1.1.3.js',
        'plugins/jquery.validate.js',
        'js/template.js',
        'js/custom.js'
    ];
    public $depends = [

        //'yii\web\YiiAsset',


        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\ModalAsset',
        //'rmrevin\yii\fontawesome\AssetBundle',
    ];

    //public $skin = '_all-skins';
    public $skin = 'red';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        /*if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }*/

            $this->css[] = sprintf('css/skins/%s.css', $this->skin);
       /* }*/

        parent::init();
    }
}
