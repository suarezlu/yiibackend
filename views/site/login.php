<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <div class="row">
        <div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <h2><?= Html::encode($this->title) ?></h2>
                <?= $form->field($model, 'username')->label('用户名：')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->label('密码：')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->label('保存密码')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('登录', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>