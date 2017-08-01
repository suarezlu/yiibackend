<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\BgUser;

class BgUserPwdForm extends Model
{
    public $pwd;
    public $newPwd;
    public $newPwdRepeat;

    private $_user;

    public function rules()
    {
        return [
            [['pwd', 'newPwd' ,'newPwdRepeat'], 'required','message' => '字段不能为空'],
            ['pwd', 'validatePwd'],
            ['newPwdRepeat', 'validateNewPwd']
        ];
    }

    public function validatePwd($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user) {
                if (!$user->validatePassword($this->pwd)) {
                    $this->addError($attribute, '密码错误！');
                }
            } else {
                $this->addError($attribute, '用户不存在！');
            }
        }
    }

    public function validateNewPwd($attribute, $params)
    {
        if (!$this->hasErrors() && $this->newPwd !== $this->newPwdRepeat) {
            $this->addError($attribute, '与新密码不一致！');
        }
    }

    public function getUser()
    {
        if (Yii::$app->user->id) {
            $this->_user = BgUser::findIdentity(Yii::$app->user->id);
        }

        return $this->_user;
    }

    public function save()
    {
        $user = $this->getUser();
        if ($user) {
            $user->setPassword($this->newPwd);
            $user->save();
        }
    }
}
?>