<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\BgUser;

class BgUserForm extends Model
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $phone;
    public $showSuccessMsg;
    public $roles = [];

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['id','username', 'password', 'email','phone','roles'],'trim'],
            ['username', 'validateUsername'],
            //['email', 'validateEmail'],
            //['phone', 'validatePhone'],
        ];
    }

    public function save()
    {
        $user = null;
        if ($this->id && is_numeric($this->id)) {
            $user = BgUser::findOne($this->id);
        }
        if(!$user) {
            $user = new BgUser();
            $user->username = $this->username;
            $user->status = BgUser::STATUS_ACTIVE;
            $user->updated_at = time();
        }

        $user->email = $this->email;
        $user->phone = $this->phone;
        if ($user->password_hash != $this->password) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }
        $user->updated_at = time();

        if ($user->save()) {
            $this->password = $user->password_hash;
            $this->id = $user->id;
            $this->showSuccessMsg = true;
            $this->roles = Yii::$app->request->post('roles');
            $this->saveRole();
        }
    }

    private function saveRole()
    {
        Yii::$app->authManager->revokeAll($this->id);
        if ($this->roles) {
            foreach ($this->roles as $name) {
                $role = Yii::$app->authManager->getRole($name);
                if ($role) {
                    Yii::$app->authManager->assign($role, $this->id);
                }
            }
        }
    }

    public function loadById($id)
    {
        $user = BgUser::findOne($id);
        if ($user) {
            $this->id = $user->id;
            $this->username = $user->username;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->password = $user->password_hash;

            $this->roles = Yii::$app->authManager->getRolesByUser($user->id);
        }
    }

    /**
     * 验证用户名
     *
     * @param $attribute
     * @param $params
     */
    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = BgUser::findOne(['username' => $this->username]);
            if ($user && $this->id != $user->id) {
                $this->addError($attribute, '用户名已注册');
            }
        }
    }

    /**
     * 验证邮箱
     *
     * @param $attribute
     * @param $params
     */
    public function validateEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = BgUser::findOne(['email' =>$this->email]);
            if ($user && $user->id != $this->id) {
                $this->addError($attribute, '邮箱已注册');
            }
        }
    }

    /**
     * 验证手机号
     *
     * @param $attribute
     * @param $params
     */
    public function validatePhone($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Bguser::findOne(['phone' => $this->phone]);
            if ($user && $user->id != $this->id) {
                $this->addError($attribute, '号码已注册');
            }
        }
    }

}