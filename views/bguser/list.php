<?php
use backend\widgets\BgSuccessMsg;
$this->title = '管理员列表';
?>
<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">管理员列表</a></li>
    <li role="presentation"><a href="/bguser/user">添加管理员</a></li>
</ul>

<h3 class="text-center"><?= $this->title ?></h3>
<table class="table table-hover">
    <thead>
    <tr><th>#</th><th>用户名</th><th>email</th><th>电话</th><th></th></tr>
    </thead>
    <tbody>
    <?php foreach($list as $i=>$item) { ?>
        <tr>
            <th><?= $i+1 ?></th>
            <td><?= $item['username'] ?></td>
            <td><?= $item['email'] ?></td>
            <td><?= $item['phone'] ?></td>
            <td>
                <?php if ($item['id'] != 1) { ?>
                <a href="/bguser/user?id=<?= $item['id'] ?>">编辑</a> |
                <a href="javascript:;" onclick="jBgUserList.del(<?= $item['id'] ?> , '<?= $item['username'] ?>' , 'del')">删除</a> |
                <a href="javascript:;" onclick="jBgUserList.del(<?= $item['id'] ?>, '<?= $item['username'] ?>', 'active')">
                    <?php
                     echo $item['status'] == \common\models\BgUser::STATUS_ACTIVE ? '禁用' : '启用';
                    ?>
                </a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<form id="bguser-list-form" method="post" class="hidden">
    <input id="bguser-list-form-id" name="id" type="hidden">
    <input id="bguser-list-form-type" name="type" type="hidden">
    <input name="_csrf-backend" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
</form>

<?php
if ($showMsg) {
    echo \backend\widgets\BgSuccessMsg::widget([
        'id' => 'bg-user-del-msg',
        'msg' => $msg,
        'show' => true
    ]);
}
?>

<script type="text/javascript">
    var jBgUserList = {
        del : function (id,name,type) {
            $('#bguser-list-form-id').val(id);
            $('#bguser-list-form-type').val(type);
            if (type == 'del' && confirm('是否删除(' + name + ')管理员？')) {
                $('#bguser-list-form').submit();
            } else if(type == 'active') {
                $('#bguser-list-form').submit();
            }
        }
    };
</script>
