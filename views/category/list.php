<?php
use backend\widgets\BgSuccessMsg;

$this->title = '商品分类';
?>
<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="javascript:;">商品分类</a></li>
    <li role="presentation"><a href="/category/aoe">添加商品分类</a></li>
</ul>
<h3 class="text-center"><?= $this->title ?></h3>

<table id="category-list" class="table table-hover">
    <thead>
    <tr><th>分类名</th><th>排序</th><th>是否显示</th><th>是否显示在导航栏</th><th></th></tr>
    </thead>
    <tbody>
    <?php foreach($list as $i=>$item) { ?>
        <tr data-tt-id="node-<?= $item['id'] ?>" <?php if($item['parent_id']!='0') echo 'data-tt-parent-id="node-' . $item['parent_id'] . '"'; ?>>
            <td><?= $item['name'] ?></td>
            <td><input value="<?= $item['sort_order'] ?>" onchange="changeSort(this,'<?= $item['id'] ?>')" style="width: 60px;"></td>
            <td><?= ($item['is_show'] == '1')?'是':'否' ?></td>
            <td><?= ($item['show_in_nav'] == '1')?'是':'否' ?></td>
            <td>
                <a href="/category/aoe?id=<?= $item['id'] ?>">修改</a>
                <?php if(!$item['has_child']) { ?>
                    | <a href="javascript:;" onclick="catDel('<?= $item['id'] ?>','<?= $item['name'] ?>');">移除</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div>
</div>
<script type="text/javascript">
    $('#category-list').treetable();
    function catDel(id,name) {
        if(confirm("是否移除分类(" + name + ")？")) {
            $.ajax({
                url:'/category/del',
                type:'post',
                dataType:'json',
                data:{'id':id},
                success:function (resp) {
                    if(resp.success == 1) {
                        location.href = location.href;
                    }else{
                        $('#bg-notrole-msg .modal-body').html(resp.msg);
                        $('#bg-notrole-msg').modal('show');
                    }
                }
            });
        }
    }
    function changeSort(obj,id) {
        var d = $(obj).val();
        if (isNaN(d) || d<0 || d>100) {
            $(obj).val(50);
        } else {
            $.ajax({
                url:'/category/sort',
                type:'post',
                dataType:'json',
                data:{'id':id,'sort':d},
                success:function(resp){
                    location.href = location.href;
                }
            })

        }
        console.log(d);
    }
</script>

<?php
    echo BgSuccessMsg::widget([
        'id' => 'bg-notrole-msg',
        'show' => false
    ]);
?>