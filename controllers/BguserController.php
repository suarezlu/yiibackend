<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\BgUserForm;
use common\models\BgUser;
use backend\models\BgUserIndexForm;
use backend\models\BgUserRoleaeFrom;
use backend\models\BgUserPwdForm;

class BguserController extends Controller
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
                        'actions' => ['index', 'list', 'user', 'del', 'file', 'role', 'roleae','permission', 'pwd', 't'],
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

    public function actionIndex()
    {
        $model = new BgUserIndexForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
        }
        return $this->render('index', ['model' => $model]);
    }

    public function actionList()
    {
        $showMsg = false;
        $msg = '';
        if (Yii::$app->request->isPost) {
            $type = Yii::$app->request->post('type');
            $id = Yii::$app->request->post('id');

            $userModel = BgUser::findOne($id);
            if (!$userModel) {
                $msg = '管理员不存在';
            } else {
                if ($userModel && $type == 'del' && Yii::$app->user->can('BgUserDelete')) {
                    // delete user role.
                    Yii::$app->authManager->revokeAll($id);
                    // delete user.
                    $userModel->delete();
                    $msg = '删除管理员成功！';
                } elseif ($userModel && $type == 'active' && Yii::$app->user->can('BgUserActive')) {
                    if ($userModel->status == BgUser::STATUS_ACTIVE) {
                        $userModel->status = BgUser::STATUS_DELETED;
                        $msg = '禁用成功！';
                    } else {
                        $userModel->status = BgUser::STATUS_ACTIVE;
                        $msg = '启用成功！';
                    }
                    $userModel->save();
                } else {
                    return $this->render('/common/notrole', [
                        'activeMenu' => 'bgSet',
                        'activeSubMenu' => ''
                    ]);
                }
            }

            $showMsg = true;
        }


        if (Yii::$app->user->can('BgUserList')) {
            $list = BgUser::find()
                ->asArray(true)
                ->orderBy('id desc')
//                ->limit(2)
//                ->offset(4)
                ->all();
            return $this->render('list',[
                'list'=>$list,
                'showMsg' => $showMsg,
                'msg' => $msg
            ]);
        } else {
            return $this->render('/common/notrole',[
                'activeMenu' => 'bgSet',
                'activeSubMenu' => ''
            ]);
        }
    }

    public function actionUser()
    {
        if (Yii::$app->user->can('BgUserAddOrEdit')) {
            $model = new BgUserForm();
            $userRoleList = array();
            if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                if ($model->validate()) {
                    $model->save();
                    $userRoleList = Yii::$app->authManager->getRolesByUser($model->id);
                }
            } else {
                $id = Yii::$app->request->get('id');
                if ($id) {
                    $model->loadById($id);
                    $userRoleList = Yii::$app->authManager->getRolesByUser($model->id);
                }
            }

            return $this->render('user',
                [
                    'model' => $model,
                    'roleList' => Yii::$app->authManager->getRoles(),
                    'userRoleList' => $userRoleList
                ]
                );
        } else {
            return $this->render('/common/notrole',[
                'activeMenu' => 'bgSet',
                'activeSubMenu' => '/bguser/list'
            ]);
        }
    }

//    public function actionFile()
//    {
//        $file = $_FILES['file_data'];
//        if (file_exists($file['tmp_name'])) {
//            $filePath = '/home/vagrant/www/yo/advanced/backend/web/img/upload/';
//            $fileName = md5_file($file['tmp_name']) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
//            move_uploaded_file($file['tmp_name'], $filePath . $fileName);
//        }
//        return $this->asJson([
//            'filename' => '/img/upload/' . $fileName,
//            'url' => 'bg.suarez.com/img/upload/' . $fileName
//        ]);
//    }

    public function actionRole()
    {
        $showMsg = false;

        if (Yii::$app->request->isPost) {
            if (Yii::$app->user->can('BgRoleDel')) {
                $this->removeRole(Yii::$app->request->post('name'));
            } else {
                return $this->render('/common/notrole',[
                    'activeMenu' => 'bgSet',
                    'activeSubMenu' => ''
                ]);
            }
            $showMsg = true;
        }

        if (Yii::$app->user->can('BgRoleList')) {
            $roleData = Yii::$app->authManager->getRoles();
            return $this->render('role',['roleData' => $roleData,'showMsg' => $showMsg]);
        } else {
            return $this->render('/common/notrole',[
                'activeMenu' => 'bgSet',
                'activeSubMenu' => ''
            ]);
        }

    }

    public function actionPermission()
    {
        if (Yii::$app->user->can('BgSetPermission')) {
            $roleName = Yii::$app->request->get('name');
            $showMsg = false;
            if (Yii::$app->request->isPost) {
                $names = Yii::$app->request->post('names');
                $role = Yii::$app->authManager->getRole($roleName);
                Yii::$app->authManager->removeChildren($role);

                foreach ($names as $n) {
                    $permission = Yii::$app->authManager->getPermission($n);
                    if ($permission) {
                        Yii::$app->authManager->addChild($role, $permission);
                    }
                }
                $showMsg = true;
            }
            return $this->render('permission',[
                'permissionList' => Yii::$app->authManager->getPermissions(),
                'perArr' => Yii::$app->authManager->getPermissionsByRole($roleName),
                'showMsg' => $showMsg
            ]);
        } else {
            return $this->render('/common/notrole', [
                'activeMenu' => 'bgSet',
                'activeSubMenu' => '/bguser/list'
            ]);
        }
    }

    /**
     * remove role by role name
     *
     * @param $name string
     */
    private function removeRole($name)
    {
        if ($name) {
            $role = Yii::$app->authManager->getRole($name);
            if ($role) {
                Yii::$app->authManager->remove($role);
            }
        }
    }

    /**
     * add or edit role
     *
     * @return string
     */
    public function actionRoleae()
    {
        if  (Yii::$app->user->can('BgRoleAddAndEdit')) {
            $model = new BgUserRoleaeFrom();
            if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                if ($model->validate()) {
                    $model->save();
                }
            } else {
                $name = Yii::$app->request->get('name');
                if ($name) {
                    $model->loadByName($name);
                }
            }
            return $this->render('roleae' ,['model' => $model]);
        } else {
            return $this->render('/common/notrole',[
                'activeMenu' => 'bgSet',
                'activeSubMenu' => '/bguser/role'
            ]);
        }

    }

    /**
     * change user password
     *
     * @return string
     */
    public function actionPwd()
    {
        if (Yii::$app->user->can('BgUserResetPwd')) {
            $showMsg = false;
            $model = new BgUserPwdForm();
            if (Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->post());
                if ($model->validate()) {
                    $model->save();
                    $showMsg = true;
                }
            }

            return $this->render('pwd', ['model' => $model, 'showMsg' => $showMsg]);
        } else {
            return $this->render('/common/notrole',[
                'activeMenu' => 'bgSet',
                'activeSubMenu' => '/bguser/pwd'
            ]);
        }
    }

    public function actionT()
    {
        return $this->renderPartial('t');
    }
}