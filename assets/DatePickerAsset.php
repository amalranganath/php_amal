<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DatePickerAsset extends AssetBundle {

    public $sourcePath = '@vendor/bower-asset/bootstrap-datepicker/dist';
    public $depends = [
        //'yii\bootstrap\BootstrapPluginAsset'
    ];

    public function init() {
        $this->css[] = YII_DEBUG ? 'css/bootstrap-datepicker.css' : 'css/bootstrap-datepicker.min.css';
        $this->js[] = YII_DEBUG ? 'js/bootstrap-datepicker.js' : 'js/bootstrap-datepicker.min.js';
    }

}
