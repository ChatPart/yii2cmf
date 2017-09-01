<?php
namespace frontend\themes\riem\assets;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{
    //public $sourcePath = '@app/web/adminlte/dist';
    public $basePath = '@webroot/riem/lte/dist';
    public $baseUrl = '@web/riem/lte/dist';
    public $css = [
        'css/AdminLTE.css',
        'css/self.css',
    ];
    public $js = [
        'js/app.min.js'
    ];
    public $depends = [
        //'rmrevin\yii\fontawesome\AssetBundle',
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',*/
        'common\assets\FontAwesomeAsset',
        'common\assets\ModalAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    //public $skin = '_all-skins';
    //public $skin = 'skin-dark-blue';
    public $skin = 'skin-silver-blue';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('css/skins/%s.css', $this->skin);
        }

        parent::init();
    }
}
