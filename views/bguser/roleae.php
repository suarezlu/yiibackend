<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;
?>


<ul class="nav nav-tabs">
    <li role="presentation"><a href="/bguser/role">角色管理</a></li>
    <li role="presentation" class="active"><a href="javascript:;"><?= $model->readOnly?'编辑角色':'添加角色' ?></a></li>
</ul>


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
