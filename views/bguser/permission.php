<?php $this->title = '权限设置'; ?>
<ul class="nav nav-tabs">
    <li role="presentation"><a href="/bguser/role">角色管理</a></li>
    <li role="presentation"><a href="/bguser/roleae">添加角色</a></li>
    <li role="presentation" class="active"><a href="javascript:;">权限设置</a></li>
</ul>

<h3 class="text-center"><?php echo $this->title . '【' . $_GET['name'] . '】'; ?></h3>
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
    <a type="button" href="/bguser/role" class="btn btn-primary">返回</a>
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