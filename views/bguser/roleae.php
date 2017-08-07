<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;
$this->title = $model->readOnly?'编辑角色':'添加角色';
?>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="/bguser/role">角色管理</a></li>
    <?php if ($model->readOnly) { ?>
        <li role="presentation"><a href="/bguser/roleae">添加角色</a></li>
        <li role="presentation" class="active"><a href="javascript:;">编辑角色</a></li>
    <?php } else { ?>
        <li role="presentation" class="active"><a href="javascript:;">添加角色</a></li>
    <?php } ?>
</ul>

<h3 class="text-center"><?= $this->title ?></h3>

<?php $form = ActiveForm::begin([
    'id' => 'role-save-form',
    'layout' => 'horizontal'
]); ?>
<?= $form->field($model, 'name')->label('角色名：')->textInput(['readonly' => $model->readOnly]) ?>
<?= $form->field($model, 'description')->label('描述：') ?>
    <div class="form-group">
        <label class="col-sm-3"></label>
        <div class="col-sm-6 text-center">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'role-save-button']) ?>
            <a href="/bguser/role" class="btn btn-primary">返回</a>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?php
if ($model->showSuccessMsg) {
    echo BgSuccessMsg::widget();
}
?>
