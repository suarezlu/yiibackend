<?php

namespace backend\modules\api\controllers;

use yii\rest\Controller;

class AuthController extends Controller
{
    protected $userInfo = null;

    public function init()
    {
        parent::init();

        return array(
            'error' => 401,
            'msg' => '未认证'
        );

    }
}