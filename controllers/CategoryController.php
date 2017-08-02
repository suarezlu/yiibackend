<?php
/**
 * Created by PhpStorm.
 * User: suarez
 * Date: 2017/8/1
 * Time: 11:27
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\CategoryAoeForm;

class CategoryController extends Controller
{

    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list', 'aoe'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionList()
    {

        return $this->render('list');
    }

    public function actionAoe()
    {
        $model = new CategoryAoeForm();

        return $this->render('aoe', [
            'model' => $model
        ]);
    }
}