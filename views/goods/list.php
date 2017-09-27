<?php
use yii\widgets\LinkPager;
use backend\widgets\BgSuccessMsg;

$this->title = '商品列表';
?>

<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="javascript:;">商品列表</a></li>
    <li role="presentation"><a href="/goods/aoe">添加商品</a></li>
</ul>
<h3 class="text-center" ><?= $this->title ?></h3>

<table id="category-list" class="table table-hover">
    <thead>
        <tr><th>商品名</th><th>价格</th><th>库存</th><th>单位</th><th>是否显示</th><th></th></tr>
    </thead>
    <tbody>
    <?php foreach($list as $i=>$item) { ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= number_format($item['price'],2) ?>元</td>
            <td><?= $item['stock'] ?></td>
            <td><?= $item['unit'] ?></td>
            <td><span class="glyphicon <?= ($item['is_show'] == '1')?'glyphicon-ok':'glyphicon-remove' ?>"> </span></td>
            <td>
                <a href="/goods/aoe?id=<?= $item['id'] ?>">修改</a>
                 | <a href="javascript:;" onclick="goodsDel('<?= $item['id'] ?>')">删除</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div class="text-center">
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>

<script type="text/javascript">
    function goodsDel(id) {
        if(confirm('是否删除该商品？')) {
            $.ajax({
                url:'/goods/del',
                type:'post',
                dataType:'json',
                data:{'id':id},
                success:function(resp){
                    if (resp.success == 1) {
                        location.href = location.href;
                    } else {
                        $('#bg-notrole-msg .modal-body').html(resp.msg);
                        $('#bg-notrole-msg').modal('show');
                    }
                }
            });
        }
    }
</script>

<?php
echo BgSuccessMsg::widget([
    'id' => 'bg-notrole-msg',
    'show' => false
]);
?>