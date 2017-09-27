<?php

namespace backend\modules\api\controllers;

use yii\rest\Controller;
use common\models\Category;

class TestController extends Controller
{
    public function actionIndex()
    {
        $data = array(
            'dd' => 'v1 hahaha'
        );
        return $data;
    }

    public function actionCategory()
    {
        $data = array();
        return $data;
    }

    public function actionRegister()
    {
        $js_code = "hhha";
        $str = "https://api.weixin.qq.com/sns/jscode2session?appid=wx2b3611e0fc3cec3f&secret=a2f4953e646fc810bc6ced9617aac2ab&js_code={$js_code}&grant_type=authorization_code";

        return array(
            'url' => $str
        );
    }
}