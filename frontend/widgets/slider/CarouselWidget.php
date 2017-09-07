<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/21
 * Time: 下午11:58
 */

namespace frontend\widgets\slider;


use common\helpers\Util;
use common\models\Carousel as CarouselModel;
use common\models\CarouselItem;
use yii\base\InvalidConfigException;
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use yii\helpers\Url;

class CarouselWidget extends Carousel
{
    /**
     * @var
     */
    public $key;

    /**
     * @var array
     */
    public $controls = [
        '<span class="glyphicon glyphicon-chevron-left"></span>',
        '<span class="glyphicon glyphicon-chevron-right"></span>',
    ];

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        if (!$this->key) {
            throw new InvalidConfigException;
        }
        $cacheKey = [
            CarouselModel::className(),
            $this->key
        ];
        $items = \Yii::$app->cache->get($cacheKey);
        if ($items === false) {
            $items = [];
            $query = CarouselItem::find()
                ->joinWith('carousel')
                ->where([
                    '{{%carousel_item}}.status' => 1,
                    '{{%carousel}}.status' => CarouselModel::STATUS_ACTIVE,
                    '{{%carousel}}.key' => $this->key,
                ])
                ->orderBy(['order' => SORT_ASC]);
            foreach ($query->all() as $k => $item) {
                /** @var $item \common\models\CarouselItem */
                $items[$k]['content'] = Html::img($item->image);
                if ($item->url) {
                    $items[$k]['content'] = Html::a($items[$k]['content'], Util::parseUrl($item->url), ['target'=>'_blank']);
                }

                if ($item->caption) {
                    $applyBtn = Url::to('article/index',['cate'=>'school']);
                    $h = <<<HTML
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1 text-center slider-text">
                                        <div class="slider-text-inner">
                                            <h1>{$item->caption}

                                            </h1>
                                            <h3> Overseas Study and Exchange Center (OSEC)</h3>
                                            <p>
                                                <a class="btn btn-white more btn-md" data-toggle="modal" data-target="#myModal">
                                                    关于我们 <i class="pl-10 fa fa-info"></i>
                                                </a> or
                                                <a href="{$applyBtn}" class="btn btn-default contact btn-md">申请报名
                                                    <i class="pl-10 fa fa-phone"></i></a>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
HTML;

                    $items[$k]['caption'] = $h;//$item->caption;
                }
            }
            \Yii::$app->cache->set($cacheKey, $items, 60*60*24*365);
        }
        $this->items = $items;
        parent::init();
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        if (!empty($this->items)) {
            $content = '';
            $this->registerPlugin('carousel');
            $content = implode("\n", [
                $this->renderIndicators(),
                $this->renderItems(),
                $this->renderControls()
            ]);
            return Html::tag('div', $content, $this->options);
        }
    }
}
