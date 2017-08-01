<?php
/**
 * Created by PhpStorm.
 * User: suarez
 * Date: 2017/8/1
 * Time: 12:12
 */
//echo 'goods/index';
echo Yii::$app->request->absoluteUrl . ' 1: ' . Yii::$app->request->url . ' 2:' . Yii::$app->requestedRoute . ' 3:'
. Yii::$app->request->pathInfo;