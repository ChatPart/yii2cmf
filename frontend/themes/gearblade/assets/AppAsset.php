<?php

namespace frontend\themes\gearblade\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $sourcePath = '@webroot/gearblade/';
    //public $sourcePath = '@web/gearblade/';
    public $basePath = '@webroot/gearblade/';
    public $baseUrl = '@web/gearblade/';

    public $css = [
        ["assets/images/favicon.ico",'type'=>"image/x-icon",'rel'=>"icon"],
        ["assets/images/apple-touch-icon-114x114-precomposed.png",'rel'=>"apple-touch-icon-precomposed" ],
        ["assets/images/apple-touch-icon-72x72-precomposed.png",'rel'=>"apple-touch-icon-precomposed" ],
        ["assets/images/apple-touch-icon-57x57-precomposed.png",'rel'=>"apple-touch-icon-precomposed" ],
        "https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" ,

        "assets/revolution/css/settings.css",
        "assets/revolution/fonts/font-awesome/css/font-awesome.css",
        "assets/revolution/fonts/font-awesome/css/font-awesome.min.css",

        "assets/revolution/css/layers.css",
        "assets/revolution/css/navigation.css",

        "assets/css/lib.css",
        "assets/css/plugins.css",
        "assets/css/elements.css",
        "assets/css/rtl.css",
        "style.css",
        ];
    public $js = [
        ['js/html5/respond.min.js','condition'=>'lt IE 9','position'=>\yii\web\View::POS_HEAD],
        'assets/js/jquery-1.12.4.min.js',
        "assets/js/lib.js",

        "assets/revolution/js/jquery.themepunch.tools.min.js?rev=5.0",
        "assets/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0",
        "assets/revolution/js/extensions/revolution.extension.video.min.js",
        "assets/revolution/js/extensions/revolution.extension.slideanims.min.js",
        "assets/revolution/js/extensions/revolution.extension.layeranimation.min.js",
        "assets/revolution/js/extensions/revolution.extension.navigation.min.js",
        "assets/revolution/js/extensions/revolution.extension.actions.min.js",

        "assets/js/functions.js",
    ];



    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\ModalAsset',
    ];
}
