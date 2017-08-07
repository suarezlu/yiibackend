<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;

$this->title = '修改密码';
?>
<h3 class="text-center">修改密码</h3>
<?php
    $form = ActiveForm::begin([
        'id' => 'user-pwd-form',
        'layout' => 'horizontal'
    ]);
?>
<?= $form->field($model, 'pwd')->label('密码：')->passwordInput() ?>
<?= $form->field($model, 'newPwd')->label('新密码：')->passwordInput() ?>
<?= $form->field($model, 'newPwdRepeat')->label('重复新密码：')->passwordInput() ?>
    <div class="form-group">
        <label class="col-sm-3"></label>
        <div class="col-sm-6 text-center">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'user-pwd-save-button']) ?>
            <?= Html::a('返回', 'javascript:;', ['class' => 'btn btn-primary', 'onclick' => 'javascript:history.back(-1);']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?php
if ($showMsg) {
    echo BgSuccessMsg::widget([
        'msg' => '设置成功'
    ]);
}
?>
