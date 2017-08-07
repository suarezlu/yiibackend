<?php
namespace backend\controllers;


use common\models\CatRecomment;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap\ActiveForm;
use yii\web\Response;
use yii\data\Pagination;
use backend\models\CategoryAoeForm;
use common\models\Category;

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
                        'actions' => ['list', 'aoe', 'save', 'del','sort'],
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

    /**
     * 分类列表
     *
     * @return string
     */
    public function actionList()
    {
        if (Yii::$app->user->can('BgCategoryList')) {
            $cat = Category::getList();
            return $this->render('list', [
                'list' => $cat
            ]);
        } else {
            return $this->render('/common/notrole');
        }
    }

    /**
     * 移除分类
     *
     * @return Response
     */
    public function actionDel()
    {
        if (Yii::$app->user->can('BgCategoryDel')) {
            $id = Yii::$app->request->post('id');
            if ($id && is_numeric($id)) {
                Category::deleteAll(['id' => $id]);
                CatRecomment::deleteAll(['cat_id' => $id]);
            }
            return $this->asJson(['success' => 1, 'msg' => '']);
        } else {
            return $this->asJson(['success' => 0, 'msg' => Yii::$app->params['sysMsg']['notRole']]);
        }
    }

    /**
     * 排序
     *
     * @return Response
     */
    public function actionSort()
    {
        $id = Yii::$app->request->post('id');
        $sort = Yii::$app->request->post('sort');
        if (is_numeric($id) && is_numeric($sort)) {
            $model = Category::findOne($id);
            if ($model) {
                $model->sort_order = $sort;
                $model->save();
            }
        }

        return $this->asJson(['success' => 1 ,'msg'=>'']);
    }

    /**
     * 添加或修改分类
     *
     * @return string
     */
    public function actionAoe()
    {
        if (Yii::$app->user->can('BgCategoryAddOrEdit')) {
            $model = new CategoryAoeForm();
            if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                if ($model->validate()) {
                    $model->save();
                }
            } elseif (Yii::$app->request->isGet && Yii::$app->request->get('id')) {
                $model->loadById(Yii::$app->request->get('id'));
            }
            return $this->render('aoe', [
                'model' => $model,
                'items' => $this->categoryDropDownListItem()
            ]);
        } else {
            return $this->render('/common/notrole');
        }
    }

    /**
     * 选择父类下拉列表
     *
     * @param null $catList
     * @return array
     */
    private function categoryDropDownListItem($catList = null)
    {
        $items = [];

        if ($catList === null) {
            $items[0] = '上级分类';
            $catList = Category::getAllCat();
        }

        foreach ($catList as $c) {
            $comm = '';
            for ($i = 1; $i < $c['level']; $i++) {
                $comm .= '|---';
            }
            $items[$c['id'] . ''] = $comm . $c['name'];
            if ($c['sub']) {
                //$subItem = $this->categoryDropDownListItem($c['sub']);
                $items += $this->categoryDropDownListItem($c['sub']);
            }
        }

        return $items;
    }

}