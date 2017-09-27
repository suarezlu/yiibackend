<?php
namespace backend\modules\wxapp\controllers;

use Yii;
use common\models\Category;

class CategoryController extends AuthController
{
    public function actionList()
    {
        $list = Category::listForWxApp();
        return $list;
    }
}