<?php
$this->params['activeMenu'] = 'bgSet';
$this->params['activeSubMenu'] = '';
?>

<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">角色管理</a></li>
    <li role="presentation"><a href="/bguser/roleae">添加角色</a></li>
</ul>

<table class="table table-hover">
    <thead>
    <tr><th>#</th><th>角色</th><th>描述</th><th></th></tr>
    </thead>
    <tbody>
<!--    <tr><th>1</th><td>hehe</td></tr>-->
    <?php
    $i = 1;
    foreach ($roleData as $item) {
        ?>
        <tr>
            <th><?php echo $i++; ?></th>
            <td><?= $item->name ?></td>
            <td><?= $item->description ?></td>
            <td>
                <?php if ($item->name != 'admin') { ?>
                    <a href="/bguser/permission?name=<?= $item->name ?>">权限设置</a> |
                    <a href="/bguser/roleae?name=<?= $item->name ?>">编辑</a> |
                    <a href="javascript:;" onclick="jBgUserRole.del('<?= $item->name ?>');">删除</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<form id="bguser-role-form" method="post" class="hidden">
    <input id="bguser-role-form-type" name="name" class="hidden">
    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
</form>

<?php
if ($showMsg) {
    echo \backend\widgets\BgSuccessMsg::widget([
        'id' => 'bg-user-del-msg',
        'msg' => '删除成功',
        'show' => true
    ]);
}
?>

<script type="text/javascript">
var jBgUserRole = {
    del:function (name) {
        $('#bguser-role-form-type').val(name);
        if (confirm('是否删除该角色（' + name + '）？')) {
            $('#bguser-role-form').submit();
        }
    }
};
</script>