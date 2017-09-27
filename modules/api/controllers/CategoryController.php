<?php

namespace backend\modules\api\controllers;

use yii\rest\Controller;
use common\models\Category;

class CategoryController extends Controller
{
    public function actionList()
    {
        return array("list");
    }
}