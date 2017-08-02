<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="/category/list">商品分类</a></li>
    <li role="presentation" class="active"><a href="javascript:;">添加商品分类</a></li>
</ul>
<h3 class="text-center" >添加分类</h3>
<?php $form = ActiveForm::begin(
    [
        'id' => 'cat-aoe-form',
        'layout' => 'horizontal'
    ]);
?>

<?= $form->field($model, 'name')->label('分类名') ?>
<?= $form->field($model, 'desc')->label('描述') ?>

<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-6 text-center">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'category-save-button']) ?>
    </div>
</div>

<?php $form = ActiveForm::end(); ?>
