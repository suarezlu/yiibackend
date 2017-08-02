<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(
        [
            'id' => 'user-index-form',
            'layout' => 'horizontal'
        ]);
?>
    <?= $form->field($model, 'id')->label('id') ?>
    <?= $form->field($model, 'imgUrl') ?>
<div class="form-group">
    <label class="control-label col-sm-3" for="bguserindexform-text">img</label>
    <div class="col-sm-6">
    <div style="width:240px;">
        <input id="bguserindexform-img" type="file">
    </div>
        <div id="bguserindexform-img-err" style="display: none;">图片上次失败</div>
    </div>
</div>
    <?= $form->field($model, 'text')->label('text')->textarea() ?>
<div class="form-group">
    <label class="control-label col-sm-3"></label>
    <div class="col-sm-6">
        <script type="text/plain" id="myEditor" style="width:600px;height:240px;">
            <p>这里我可以写一些输入提示</p>
        </script>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-3" for="bguserindexform-text">img demo 2</label>
    <div class="col-sm-6">
        <input id="bguserindexform-img2" type="file">
        <div id="bguserindexform-img-err2" style="display: none;"></div>
    </div>
</div>

    <div class="form-group">
        <label class="control-label col-sm-3"></label>
        <div class="col-sm-6 text-center">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary', 'name' => 'user-save-button']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>

<?php //var_dump($model); ?>

<script type="text/javascript">
    var um = UM.getEditor('myEditor');
    $(function(){
        $("#bguserindexform-img").fileinput({
            language:'zh',
            //uploadUrl:'/bguser/file',
            uploadUrl:'http://img.suarez.com/index.php',
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            //removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#bguserindexform-img-err',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/img/default_avatar_male.jpg" alt="头像" style="width:160px">',
            layoutTemplates: {main2: '{preview}{remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        }).on('fileuploaded', function(event, data, previewId, index) {
            if(data.response.success){
                $('#bguserindexform-imgurl').val(data.response.url);
            }
        }).on('fileremoved', function(event, id, index) {
            $('#bguserindexform-imgurl').val('');
        }).on('fileclear', function(event) {
            $('#bguserindexform-imgurl').val('');
        }).on('filesuccessremove', function(event, key, jqXHR, data) {
            $('#bguserindexform-imgurl').val('');
        });


        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#bguserindexform-img2").fileinput({
            language:'zh',
            //uploadUrl:'http://img.suarez.com/index.php',
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            showBrowse: false,
            browseOnZoneClick: true,
            removeLabel: '',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#bguserindexform-img-err2',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/img/default_avatar_male.jpg" alt="头像" style="width:160px"><h6 class="text-muted">Click to select</h6>',
            layoutTemplates: {main2: '{preview} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        }).on('fileuploaded', function(event, data, previewId, index) {
            if(data.response.success){
                $('#bguserindexform-imgurl').val(data.response.url);
            }
        }).on('fileremoved', function(event, id, index) {
            $('#bguserindexform-imgurl').val('');
        }).on('fileclear', function(event) {
            $('#bguserindexform-imgurl').val('');
        }).on('filesuccessremove', function(event, key, jqXHR, data) {
            $('#bguserindexform-imgurl').val('');
        });
    });
</script>

<script type="text/javascript">
//    $(function(){
//        $("#version").bind("blur",function(){
//            var version = $("#version").val();
//            var reg = /([0-9]{1}.){1,}[0-9]{1}$/;
//
//            if(version != null){
//                if(!reg.test(version)){
//                    $("#cmsg").html("格式不正确,数字小数点组合");
//                }else{
//                    $("#cmsg").html("");
//                }
//            }
//
//        });
//    });
//
//    var btnCust = '';
//    var icon = $("#icon").val();
//    var bg_image = $("#bg_image").val();
//
//    var url = "/public/bootstrap-fileinput/img/add_img.png";
//    var bg_url = "/public/bootstrap-fileinput/img/add_img.png";
//
//    if(icon != ''){
//        url = icon;
//    }
//    if(bg_image != ''){
//        bg_url = bg_image;
//    }
//
//    $("#avatar").fileinput({
//        overwriteInitial: true,
//        maxFileSize: 1500,
//        showClose: false,
//        showCaption: false,
//        browseLabel: '',
//        removeLabel: '',
//        browseIcon: '<i class="fa fa-folder-open-o"></i>添加',
//        removeIcon: '<i class="fa fa-trash-o"></i>清除',
//        removeTitle: 'Cancel or reset changes',
//        elErrorContainer: '#kv-avatar-errors',
//        msgErrorClass: 'alert alert-block alert-danger',
//        defaultPreviewContent: '<img src="'+url+'" alt="" style="width:160px">',
//        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
//        allowedFileExtensions: ["jpg", "png", "gif"]
//    });
//
//    $("#bg").fileinput({
//        overwriteInitial: true,
//        maxFileSize: 1500,
//        showClose: false,
//        showCaption: false,
//        browseLabel: '',
//        removeLabel: '',
//        browseIcon: '<i class="fa fa-folder-open-o"></i>添加',
//        removeIcon: '<i class="fa fa-trash-o"></i>清除',
//        removeTitle: 'Cancel or reset changes',
//        elErrorContainer: '#kv-avatar-errors',
//        msgErrorClass: 'alert alert-block alert-danger',
//        defaultPreviewContent: '<img src="'+bg_url+'" alt="" style="width:160px">',
//        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
//        allowedFileExtensions: ["jpg", "png", "gif"]
//    });
//
//    $("#input-pt-br").fileinput({
//        language: "zh",
//        uploadUrl: "",
//        maxFileCount: 5,
//        showUpload: false,
//        showCancel: false,
//        showCaption: false,
//        overwriteInitial: false,
//        dropZoneEnabled: false,
//        allowedFileExtensions: ["jpg","jpeg", "png", "gif"]
//    });

</script>
