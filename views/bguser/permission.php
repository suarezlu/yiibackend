<?php
$this->params['activeMenu'] = 'bgSet';
$this->params['activeSubMenu'] = '/bguser/role';
?>
<h2>角色权限设置（<?php echo $_GET['name']; ?>）</h2>
<form id="per-form" method="post">
    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <?php foreach ($permissionList as $item) { ?>
            <div class="checkbox">
            <label>
                <input type="checkbox" value="<?= $item->name ?>" name="names[]" <?= isset($perArr[$item->name]) ? 'checked' : '' ?>> <?= $item->description ?> <br>
            </label>
            </div>
        <?php } ?>
    <button type="submit" class="btn btn-primary">保存</button>
    <a type="button" onclick="javascript:history.back(-1);" class="btn btn-primary">返回</a>
</form>

<script type="text/javascript">
function perFormSubmit(){
    $('#per-form').submit()
}
</script>

<?php
if ($showMsg) {
    echo \backend\widgets\BgSuccessMsg::widget([
        'id' => 'bg-permission-msg',
        'msg' => '保存成功',
        'show' => true
    ]);
}
?>