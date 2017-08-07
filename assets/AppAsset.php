<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'bootstrap-fileinput/css/fileinput.min.css',
        'ueditor/themes/default/css/umeditor.css',
        'jquery-treetable/jquery.treetable.css',
        'jquery-treetable/jquery.treetable.theme.backend.css'
    ];
    public $js = [
        'bootstrap-fileinput/js/fileinput.min.js',
        'bootstrap-fileinput/js/locales/zh.js',
        'ueditor/third-party/template.min.js',
        'ueditor/umeditor.min.js',
        'ueditor/lang/zh-cn/zh-cn.js',
        'ueditor/umeditor.config.js',
        'jquery-treetable/jquery.treetable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
