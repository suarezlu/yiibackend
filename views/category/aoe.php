<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;

if($model->id) {
    $this->title = '编辑商品分类';
} else {
    $this->title = '添加商品分类';
}
?>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="/category/list">商品分类</a></li>
    <?php if ($model->id) { ?>
    <li role="presentation"><a href="/category/aoe">添加商品分类</a></li>
    <li role="presentation" class="active"><a href="javascript:;">编辑商品分类</a></li>
    <?php } else { ?>
    <li role="presentation" class="active"><a href="javascript:;">添加商品分类</a></li>
    <?php } ?>
</ul>
<h3 class="text-center" ><?= $this->title ?></h3>
<?php $form = ActiveForm::begin(
    [
        'id' => 'cat-aoe-form',
        'layout' => 'horizontal',
        'enableAjaxValidation' => false
    ]);
?>

<?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'name')->label('分类名：') ?>
<?= $form->field($model, 'parentId')->label('上级分类：')->dropDownList($items) ?>
<?= $form->field($model, 'sortOrder')->label('排序：') ?>
<?= $form->field($model, 'isShow')->label('是否显示：')->radioList(['1' => '显示','0' => '不显示']) ?>
<?= $form->field($model, 'showInNav')->label('是否显示在导航栏：')->radioList(['1' => '显示','0' => '不显示']) ?>
<?= $form->field($model, 'keywords')->label('关键字：') ?>
<?= $form->field($model, 'recomment')->label('设置为首页推荐：')->checkboxList(['1'=> '精品','2'=>'最新','3' => '最热']) ?>
<?= $form->field($model, 'desc')->label('描述：')->textarea() ?>

<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-6 text-center">
        <button class="btn btn-primary" onclick="categorySave()">保存</button>
        <a href="/category/list" class="btn btn-primary">返回</a>
    </div>
</div>

<?php
    $form = ActiveForm::end();
    if ($model->showSuccessMsg) {
        echo BgSuccessMsg::widget([
            'id' => 'bg-success-msg',
            'show' => true
        ]);
    }
?>


