<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Category;
use common\models\CatRecomment;
use common\models\Goods;

class GoodsAoeForm extends Model
{
    public $id;
    public $catId;
    public $category;
    public $name;
    public $price;
    public $stock = 0;
    public $unit;
    public $desc = '';
    public $img;

    /**
     * @var UploadedFile
     */
    public $imgFile;
    public $thumb;
    public $thumbFile;
    public $isShow = true;
    public $isDeleted = 0;
    public $showSuccessMsg = false;

    public function rules()
    {
        return [
            [['name', 'price', 'unit'], 'required', 'message' => '请填写字段'],
            [['price'], 'number'],
            [['id','catId','name','price','stock', 'unit', 'desc', 'isShow', 'imgFile'], 'safe'],
        ];
    }

    /**
     * save goods
     */
    public function save()
    {
        $goods = null;
        if ($this->id && is_numeric($this->id)) {
            $goods = Goods::findOne($this->id);
            if ($goods)
                $this->img = $goods->img;
        }

        if (!$goods) {
            $goods = new Goods();
        }

        $goods->cat_id = $this->catId;
        $goods->name = $this->name;
        $goods->price = $this->price;
        $goods->stock = $this->stock;
        $goods->unit = $this->unit;
        $goods->is_show = $this->isShow;
        $goods->desc = $this->desc;

        // upload img
        $this->imgFile = UploadedFile::getInstance($this, 'imgFile');
        if ($this->imgFile) {
            if (!is_dir(Yii::$app->params['imgPath'] . 'goods_img/' . date('Ymd'))) {
                if (!is_dir(Yii::$app->params['imgPath'] . 'goods_img/')) {
                    mkdir(Yii::$app->params['imgPath'] . 'goods_img/');
                }
                mkdir(Yii::$app->params['imgPath'] . 'goods_img/' . date('Ymd'));
            }

            $imgName = 'goods_img/' . date('Ymd/') . $this->imgFile->baseName . '.' . $this->imgFile->extension;
            $this->img = Yii::$app->params['imgHost'] . '/' . $imgName;
            $goods->img = $this->img;
            $this->imgFile->saveAs(Yii::$app->params['imgPath'] . $imgName);
        }

        if($goods->save()) {
            $this->id = $goods->id;
            $this->showSuccessMsg = true;
        }

    }

    /**
     * load goods model
     *
     * @param $id
     */
    public function loadById($id)
    {
        if ($id && is_numeric($id)) {
            $goods = Goods::findOne($id);
            if ($goods) {
                $this->id = $goods->id;
                $this->catId = $goods->cat_id;
                $this->name = $goods->name;
                $this->price = $goods->price;
                $this->stock = $goods->stock;
                $this->unit = $goods->unit;
                $this->desc = $goods->desc;
                $this->img = $goods->img;
                $this->thumb = $goods->thumb;
                $this->isShow = $goods->is_show;
                $this->isDeleted = $goods->is_deleted;
            }
        }
    }
}