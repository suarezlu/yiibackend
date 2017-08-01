<?php
namespace backend\models;

use Yii;
use yii\base\Model;

class BgUserRoleaeFrom extends Model
{
    public $name;
    public $description;
    public $showSuccessMsg;
    public $readOnly = false;

    public function rules()
    {
        return [
            [['name', 'description'], 'required','message' => '字段不能为空'],
            ['name', 'validateName']
        ];
    }

    public function save()
    {
        $auth = Yii::$app->authManager;

        $role = $auth->getRole($this->name);
        if ($role) {
            $role->description = $this->description;
            $auth->update($this->name, $role);
            $this->readOnly = true;
        } else {
            $role = $auth->createRole($this->name);
            $role->description = $this->description;
            $auth->add($role);
        }

        $this->showSuccessMsg = true;
    }

    public function loadByName($name)
    {
        $role = Yii::$app->authManager->getRole($name);
        if ($role) {
            $this->name = $name;
            $this->description = $role->description;
            $this->readOnly = true;
        }
    }

    public function validateName($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (Yii::$app->authManager->getRole($this->name) && !Yii::$app->request->get('name')) {
                $this->addError($attribute, '角色已存在');
            }
        }
    }
}