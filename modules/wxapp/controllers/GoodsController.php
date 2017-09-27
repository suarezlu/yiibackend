<?php
namespace backend\modules\wxapp\controllers;

use Yii;
use common\models\Goods;

class GoodsController extends AuthController
{
    /**
     * get goods for wxapp
     *
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionList()
    {
        $list = Goods::getAllForGoods();
        foreach ($list as $i => $item){
            $list[$i]['price'] = (float)sprintf("%.2f", $item['price']);
            $list[$i]['count'] = 0;
        }
        return $list;
    }
}
