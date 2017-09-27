<?php

namespace backend\modules\api\controllers;

use yii\rest\Controller;

class UserController extends AuthController
{
    public function actionAccesstoken()
    {
        return array('hehe');
    }
}