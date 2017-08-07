<?php
/**
 * Created by PhpStorm.
 * User: suarez
 * Date: 2017/8/1
 * Time: 17:00
 */

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Category;
use common\models\CatRecomment;

class CategoryAoeForm extends Model
{
    public $id;
    public $name;
    public $parentId = 0;
    public $sortOrder = 50;
    public $showInNav = 0;
    public $isShow = 1;
    public $recomment;
    public $keywords;
    public $desc;
    public $showSuccessMsg = false;

    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 90],
            [['keywords', 'desc'], 'string', 'max' => 255],
            ['sortOrder', 'integer', 'integerOnly' => true, 'min' => 0],
            ['parentId','validateParentId'],
            [['id','name', 'parentId', 'sortOrder', 'showInNav', 'isShow', 'recomment', 'keywords', 'desc'], 'safe'],
        ];
    }

    public function save()
    {
        $categoryModel = null;
        if ($this->id && is_numeric($this->id)) {
            $categoryModel = Category::findOne($this->id);
        }

        if (!$categoryModel) {
            $categoryModel = new Category();
        }
        $categoryModel->name = $this->name;
        $categoryModel->keywords = $this->keywords;
        $categoryModel->parent_id = $this->parentId;
        $categoryModel->desc = $this->desc;
        $categoryModel->show_in_nav = $this->showInNav;
        $categoryModel->is_show = $this->isShow;
        $categoryModel->sort_order = $this->sortOrder;

        if ($categoryModel->save()) {
            $this->id = $categoryModel->id;
            if ($this->id) {
                CatRecomment::deleteAll(['cat_id' => $this->id]);
                if ($this->recomment) {
                    foreach ($this->recomment as $recomment) {
                        $catRcmModel = new CatRecomment();
                        $catRcmModel->cat_id = $this->id;
                        $catRcmModel->recomment = $recomment;
                        $catRcmModel->save();
                    }
                }
            }
            $this->showSuccessMsg = true;
        }
    }

    public function loadById($id)
    {
        $category = Category::findOne($id);
        if ($category) {
            $this->id = $category->id;
            $this->name = $category->name;
            $this->parentId = $category->parent_id;
            $this->showInNav = $category->show_in_nav;
            $this->isShow = $category->is_show;
            $this->keywords = $category->keywords;
            $this->desc = $category->desc;

            $this->recomment = [];
            $catRecommentList = CatRecomment::find()
                ->where(['cat_id' => $this->id])
                ->select('recomment')
                ->asArray()
                ->all();
            foreach ($catRecommentList as $catRecomment) {
                $this->recomment[] = $catRecomment['recomment'];
            }
        }
    }

    /**
     * 验证上级分类
     *
     * @param $attribute
     * @param $params
     */
    public function validateParentId($attribute, $params)
    {
        if (!$this->hasErrors() && $this->id) {
            $arr = Category::findChildIds($this->id);
            if (in_array($this->parentId, $arr) || $this->id == $this->parentId) {
                $this->addError($attribute, '所选择的上级分类不能是当前分类或者当前分类的下级分类');
            }
        }
    }

}