<?php
/**
 * Created by PhpStorm.
 * Author: ljt
 * DateTime: 2017/2/17 12:04
 * Description:
 */

namespace common\modules\chat;


use common\components\PackageInfo;

class ModuleInfo extends \common\modules\ModuleInfo
{
    public $info = [
        'author' => 'XQ',
        'bootstrap' => 'frontend|backend',
        'version' => 'v1.0',
        'id' => 'chat',
        'name' => '通讯',
        'description' => '通讯'
    ];
}