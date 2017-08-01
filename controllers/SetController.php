<?php
/**
 * Created by PhpStorm.
 * User: suarez
 * Date: 2017/7/25
 * Time: 15:46
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\BgUserForm;
use common\models\BgUser;
use backend\models\BgUserIndexForm;
use backend\models\BgUserRoleaeFrom;
use backend\models\BgUserPwdForm;

class SetController extends Controller
{
    public $layout = 'bglayout';

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
                        'actions' => ['index'],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPwd()
    {}
}