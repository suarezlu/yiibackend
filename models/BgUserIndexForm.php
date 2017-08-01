<?php
namespace backend\models;

use Yii;
use yii\base\Model;

class BgUserIndexForm extends Model
{
    public $id;
    public $imgUrl;
    public $text;

    public function rules()
    {
        return [
            [['id', 'imgUrl', 'text'], 'trim'],
            [['text'], 'required']
        ];
    }
}