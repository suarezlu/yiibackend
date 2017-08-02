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

class CategoryAoeForm extends Model
{
    public $name;
    public $keywords;
    public $parentId;
    public $desc;
    public $showInNav;
    public $isShow;
    public $sortOrder;

    public function rules()
    {
        return [
            ['name', 'required', 'message' => '字段不能为空'],
            ['name', 'string', 'max' => 90],
            [['keywords', 'desc'], 'string', 'max' => 255],
        ];
    }

}