<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\widgets\BgSuccessMsg;

if($model->id) {
    $this->title = '编辑商品';
} else {
    $this->title = '添加商品';
}
?>

<ul class="nav nav-tabs">
    <li role="presentation"><a href="/goods/list">商品列表</a></li>
    <?php if ($model->id) { ?>
        <li role="presentation"><a href="/goods/aoe">添加商品</a></li>
        <li role="presentation" class="active"><a href="javascript:;">修改商品</a></li>
    <?php } else { ?>
        <li role="presentation" class="active"><a href="javascript:;">添加商品</a></li>
    <?php } ?>
</ul>
<h3 class="text-center" ><?= $this->title ?></h3>

<?php $form = ActiveForm::begin(
    [
        'id' => 'goods-aoe-form',
        'layout' => 'horizontal',
        'options' => ['enctype' => 'multipart/form-data']
    ]);
?>

<?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'catId')->label('上级分类：')->dropDownList($items) ?>
<?= $form->field($model, 'name')->label('名称：') ?>
<?= $form->field($model, 'price')->label('价格：') ?>
<?= $form->field($model, 'stock')->label('库存：') ?>
<?= $form->field($model, 'unit')->label('单位：') ?>
<?= $form->field($model, 'isShow')->label('是否显示：')->radioList(['1' => '显示', '0' => '不显示']) ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="bguserindexform-text">商品图片：</label>
    <div class="col-sm-6">
        <div>
            <input id="goods-img" name="GoodsAoeForm[imgFile]" type="file">
        </div>
        <div id="goods-img-err" style="display: none;">图片上次失败</div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3">详细介绍：</label>
    <div class="col-sm-6">
        <script type="text/plain" id="myEditor" style="width:750px;height:240px;" name="GoodsAoeForm[desc]"><?= $model->desc?$model->desc:'' ?></script>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-6 text-center" >
        <button class="btn btn-primary" type="submit">保存</button>
        <a href="/goods/list" class="btn btn-primary">返回</a>
    </div>
</div>

<script type="text/javascript">
    //document.domain = 'img.suarez.com';
    var um = UM.getEditor('myEditor',{
        //imageUrl:'http://img.suarez.com/ueditor/php/controller.php'
    });
    $(function () {
        $("#goods-img").fileinput({
            language:'zh',
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            elErrorContainer: '#goods-img-err',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?= $model->img?$model->img:'/img/default_avatar_male.jpg' ?>" alt="上传图片" style="max-height: 250px;max-width: 500px;">',
            layoutTemplates: {main2: '{preview}{remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    })
</script>

<?php
$form = ActiveForm::end();
if ($model->showSuccessMsg) {
    echo BgSuccessMsg::widget([
        'id' => 'bg-success-msg',
        'show' => true
    ]);
}
?>
