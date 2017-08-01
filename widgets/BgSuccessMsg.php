<?php
namespace backend\widgets;
use Yii;
use yii\bootstrap\Widget;
use yii\bootstrap\Modal;

class BgSuccessMsg extends Widget
{
    public $id = 'bg-success-msg-modal';
    public $msg = '保存成功！';
    public $show = true;

    public function init()
    {
        parent::init();
        Modal::begin([
            'id' => $this->id,
            'closeButton' => false,
            'size' => Modal::SIZE_SMALL,
            'clientOptions' => [
                'show' => $this->show
            ]
        ]);
        echo $this->msg;
        Modal::end();
    }
}