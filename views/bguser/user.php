<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;

$this->params['activeMenu'] = 'bgSet';
$this->params['activeSubMenu'] = '/bguser/list';

if ($model->id) {
    $this->title = '编辑管理员';
} else {
    $this->title = '添加管理员';
}
?>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="/bguser/list">管理员列表</a></li>
    <li role="presentation" class="active"><a href="#"><?= $this->title ?></a></li>
</ul>
<h3 class="text-center"><?php echo Html::encode($this->title); ?></h3>
<?php $form = ActiveForm::begin([
    'id' => 'user-save-form',
    'layout' => 'horizontal'
]); ?>
    <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>
    <?= $form->field($model, 'username')->label('用户名：') ?>
    <?= $form->field($model, 'password')->label('密码：')->passwordInput() ?>
    <?= $form->field($model, 'email')->label('邮箱：') ?>
    <?= $form->field($model, 'phone')->label('电话：') ?>
    <div class="form-group">
        <label class="control-label col-sm-3">角色：</label>
        <div class="col-sm-6 checkbox">
            <?php foreach ($roleList as $item) { ?>
                <label>
                    <input type="checkbox" value="<?= $item->name ?>" name="roles[]" <?= isset($userRoleList[$item->name]) ? 'checked':'' ?> > <?= $item->name ?> <br>
                </label>
            <?php } ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3"></label>
        <div class="col-sm-6 text-center">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'user-save-button']) ?>
            <?= Html::a('返回', '/bguser/list', ['class' => 'btn btn-primary']) ?>
            <?php //echo Html::a ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php
if ($model->showSuccessMsg) {
    echo BgSuccessMsg::widget();
}
?>
