<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="qc:admins" content="2553007401006375" />
    <script type="text/javascript" src="http://h5.6533.com/public/web/mobile/js/jquery.min.js"></script>
    <meta itemprop="name" content="h5手游,手机页游,好玩的在线网游 – 6533微网游"/>
    <meta itemprop="image" content="http://h5.6533.com/public/web/mobile/images/new_logo.jpg" />
    <meta name="description" itemprop="description" content="6533在线玩 h5手游频道提供最新最好玩的html5在线网游,html5手机游戏,多人在线游戏等信息！" />
    <title>h5手游,手机页游,好玩的在线网游 – 6533微网游</title>
    <meta name="keywords" content="h5手游,h5网游,6533微网游">
    <meta name="description" content="6533在线玩 h5手游频道提供最新最好玩的html5在线网游,html5手机游戏,多人在线游戏等信息！">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" type="text/css" href="http://h5.6533.com/public/web/mobile/css/new_style.css">
    <link rel="stylesheet" type="text/css" href="http://h5.6533.com/public/web/mobile/css/new_huosdk1.css">
    <link rel="stylesheet" type="text/css" href="http://h5.6533.com/public/web/mobile/css/css_reset.css">
    <link rel="stylesheet" type="text/css" href="http://h5.6533.com/public/web/mobile/css/carousel.css">
    <script type="text/javascript" src="http://h5.6533.com/public/web/mobile/js/new_huosdk.js"></script>
    <script type="text/javascript" src="http://h5.6533.com/public/web/mobile/js/cookie.js"></script>
    <script type="text/javascript" src="http://h5.6533.com/public/web/mobile/js/koala.min.1.5.js"></script>
    <script type="text/javascript" src="http://h5.6533.com/public/web/mobile/js/terminator2.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://h5.6533.com/public/web/mobile/css/color_v9.css">
</head>
<body style="padding-bottom: 0px;margin:0 auto;" class=" hPC">
<script type="text/javascript">
    function loginDirect(){
        window.location.href="/account/index";
    }
    //setTimeout("$('#show_search_u_di').show()",3000);//3秒在显示搜索图片，防止和内容重叠
</script>
<header class="head clearfix">
    <div class="logo">
        <a href="http://h5.6533.com">
            <img src="http://h5.6533.com/public/web/mobile/images/new_logo3.png" alt="6533在线玩" title="6533在线玩">
        </a>
    </div>
    <div class="search" style="width: 455px;">
        <a id="head_user_login" href="javascript:void(0)" onclick="loginDirect()" class="a1">个人中心</a>
        <a href="/search/index" class="a2">搜索</a>
    </div>
</header>
<nav>
    <style>
        .main_nav{
            /*float:left;*/
            display: block !important;
        }
        .main_nav li{
            float:left;
        }
    </style>
    <ul class="main_nav clearfix">
        <li class="" style="width:17%;">
            <a href="http://h5.6533.com?agent=0" title="手机游戏">首页</a>
        </li>
        <li class="hover" style="width:16%;">
            <a href="/list/wy" title="手机页游">网游</a>
        </li>
        <li class="" style="width:17%;">
            <a href="/dj_list/dj" title="h5游戏大全">单机</a>
        </li>
        <li class="" style="width:16%;">
            <a href="/activity/index" title="活动">活动</a>
        </li>
        <li class="" style="width:17%;">
            <a href="/zx/zx_list" title="h5游戏资讯">资讯</a>
        </li>
        <li class="" style="width:16%;">
            <a href="/libao/index" title="游戏礼包">礼包</a>
        </li>
    </ul>
</nav>
<style>
    /*网游*/
    .index_tab,.index_tab2{clear:both; margin:10px auto; width:90%;}
    .index_tab li,.index_tab2 li{float:left; width:33.3%; height:40px; cursor:pointer; position:relative;}
    .index_tab2 li{width:50%;}
    .index_tab li p,.index_tab2 li p{display:block; background:#fff; line-height:38px; font-size:16px; text-align:center; border:1px solid #e0e0e0; color:#808080;}
    .index_tab li .p1,.index_tab2 li .p1{border-radius:4px 0 0 4px;}
    .index_tab li .p2,.index_tab2 li .p2{border-left:none; border-right:none;}
    .index_tab li .p3,.index_tab2 li .p3{border-radius:0 4px 4px 0;}
    .index_tab li em,.index_tab2 li em{position:absolute; bottom:-4px; left:50%; margin-left:-10px; width:10px; height:5px; background:url(http://h5.6533.com/img/arrow.png) no-repeat; background-size:10px 5px; display:none;}
    .index_tab li.hover em,.index_tab2 li.hover em{display:inline-block;}
    .index_tab li.hover p,.index_tab2 li.hover p{background:#FFA500; color:#fff; border:1px solid #FFD700; font-weight:bold;}
</style>
<ul class="index_tab2 clearfix">
    <li class="hover" id="one1">
        <a href="javascript:void(0);" onclick="setTab('one', 1, 2)">
            <p class="p1">最新</p>
            <em></em>
        </a>
    </li>
    <li class="" id="one2">
        <a href="javascript:void(0);" onclick="setTab('one', 2, 2)">
            <p class="p3">最热</p>
            <em></em>
        </a>
    </li>
</ul>
<div id="con_one_1" style="display: block;">
    <script>
        $(function () {
            var unlock1 = true;
            $(window).scroll(function () {
                var winH = $(window).height();
                var scrH = $(window).scrollTop();
                var htmH = $(document).height() - 100;
                if (winH + scrH >= htmH) {
                    var obj = $("#ajax_idx_more1");
                    if ($(obj).length <= 0)
                        return;
                    ajaxidxmore1(obj);
                }
            });
            function ajaxidxmore1(obj) {

                if (!unlock1)
                    return;
                var html0 = $(obj).html();
                $(obj).html("加载中...");
                var page = $(obj).attr("rel");
                if (!isNaN(page)) {
                    unlock1 = false;
                    var game_type = '0';
                    var orderTy = 'wy';
                    var flag = '';
                    var agent = "0";
                    var query = {"orderTy": orderTy, "page": page, "game_type": game_type, "flag":flag, "agent": agent};
                    $.post('/list/ajaxlist', query, function (data) {

                        var top = $(document).scrollTop();
                        $("#_list1").append(data.html);
                        $(obj).attr("rel", data.page);
                        $(document).scrollTop(top);
                        if (data.page != "end") {
                            unlock1 = true;
                            $(obj).html(html0);
                        } else{
                            $(obj).html("已到最后...");
                        }

                        $("#_list1").find("a").each(function(){
                            var flag = '';
                            var href = $(this).attr("href");
                            if (href.indexOf("flag") == - 1)
                                $(this).attr("href", href);
                        });
                    }, "json")
                }
            }
        })
    </script>
    <div class="public new_public clearfix">
        <div class="list_one">
            <dl id="_list1">
                <dt>
                    <a href="/detail/index/appid/100240/agent/0">
                        <p class="p1">
                            <img src="http://h5.6533.com/upload/logo/xzsj_1499753146.png">
                        </p>
                        <p class="p2">
                            <i>无双霸域</i>
                            <em>
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                            </em>
                            <span>动作类 &nbsp;&nbsp;&nbsp;人气：45376</span>
                        </p>
                        <p class="p3">
                            <span>开始玩</span>
                        </p>
                    </a>
                </dt>
                <dt>
                    <a href="/detail/index/appid/100239/agent/0">
                        <p class="p1">
                            <img src="http://h5.6533.com/upload/logo/xzsj_1499753146.png">
                        </p>
                        <p class="p2">
                            <i>修真世界</i>
                            <em>
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_2.png">
                            </em>
                            <span>网游类 &nbsp;&nbsp;&nbsp;人气：45257</span>
                        </p>
                        <p class="p3">
                            <span>开始玩</span>
                        </p>
                    </a>
                </dt>
                <dt>
                    <a href="/detail/index/appid/100237/agent/0">
                        <p class="p1">
                            <img src="http://h5.6533.com/upload/logo/hpsz_1499829903.jpg">
                        </p>
                        <p class="p2">
                            <i>火拼三张</i>
                            <em>
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                            </em>
                            <span>棋牌类&nbsp;&nbsp;&nbsp;人气：22082</span>
                        </p>
                        <p class="p3">
                            <span>开始玩</span>
                        </p>
                    </a>
                </dt>
                <dt>
                    <a href="/detail/index/appid/100223/agent/0">
                        <p class="p1">
                            <img src="http://h5.6533.com/upload/logo/wcby_1498177945.png">
                        </p>
                        <p class="p2">
                            <i>王城霸域</i>
                            <em>
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                                <img src="http://h5.6533.com/public/web/mobile/images/star_1.png">
                            </em>
                            <span>策略类 &nbsp;&nbsp;&nbsp;人气：13282</span>
                        </p>
                        <p class="p3">
                            <span>开始玩</span>
                        </p>
                    </a>
                </dt>
            </dl>
        </div>
    </div>
    <div id="ajax_idx_more1" rel="2" class="new_morelist">加载更多</div>
</div>
<div id="con_one_2" style="display: none;">
    <script>
        $(function () {
            var unlock2 = true;
            $(window).scroll(function () {
                var winH = $(window).height();
                var scrH = $(window).scrollTop();
                var htmH = $(document).height() - 100;
                if (winH + scrH >= htmH) {
                    var obj = $("#ajax_idx_more2");
                    if ($(obj).length <= 0)
                        return;
                    ajaxidxmore2(obj);
                }
            });
            function ajaxidxmore2(obj) {
                if (!unlock2)
                    return;
                var html0 = $(obj).html();
                $(obj).html("加载中...");
                var page = $(obj).attr("rel");
                if (!isNaN(page)) {
                    unlock2 = false;
                    var game_type = '0';
                    var orderTy = 'wy';
                    var flag = '';
                    var agent = "0";
                    var query = {"orderTy": orderTy, "page": page, "game_type": game_type, "flag":flag, "agent": agent};
                    $.post('/list/ajaxtoplist', query, function (data) {
                        var top = $(document).scrollTop();
                        $("#_list2").append(data.html);
                        $(obj).attr("rel", data.page);
                        $(document).scrollTop(top);
                        if (data.page != "end") {
                            unlock2 = true;
                            $(obj).html(html0);
                        } else {
                            $(obj).html("已到最后...");
                        }

                        $("#_list2").find("a").each(function(){
                            var flag = '';
                            var href = $(this).attr("href");
                            if (href.indexOf("flag") == - 1)
                                $(this).attr("href", href);
                        });
                    }, "json")
                }
            }
        })
    </script> <div class="public new_public clearfix"> <div class="list_one"> <dl id="_list2"> <dt> <a href="/detail/index/appid/100075/agent/0"> <p class="p1"><img src="/upload/logo/cqsj_zjty_1484193311.png"></p> <p class="p2"> <i>传奇世界-仗剑天涯</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>策略类 &nbsp;&nbsp;&nbsp;人气：176891</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100003/agent/0"> <p class="p1"><img src="/upload/logo/ygys_1482892157.png"></p> <p class="p2"> <i>愚公移山</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_2.png"><img src="/public/web/mobile/images/star_2.png"> </em> <span>放置类 &nbsp;&nbsp;&nbsp;人气：92859</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100191/agent/0"> <p class="p1"><img src="/upload/logo/wlzl_1492494342.png"></p> <p class="p2"> <i>卧龙之力</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>冒险类&nbsp;&nbsp;&nbsp;人气：79211</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100087/agent/0"> <p class="p1"><img src="/upload/logo/blzz_1486708503.png"></p> <p class="p2"> <i>部落战争</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>网游类 &nbsp;&nbsp;&nbsp;人气：78036</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100080/agent/0"> <p class="p1"><img src="/upload/logo/yszz_1484902351.jpg"></p> <p class="p2"> <i>一世之尊</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>网游类 &nbsp;&nbsp;&nbsp;人气：71388</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100092/agent/0"> <p class="p1"><img src="/upload/logo/ygccc_1486713228.png"></p> <p class="p2"> <i>勇敢冲冲冲</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>冒险类 &nbsp;&nbsp;&nbsp;人气：70003</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100145/agent/0"> <p class="p1"><img src="/upload/logo/sssj_1488794528.png"></p> <p class="p2"> <i>蜀山世界</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>冒险类 &nbsp;&nbsp;&nbsp;人气：66237</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100154/agent/0"> <p class="p1"><img src="/upload/logo/hlxd_1489477504.jpg"></p> <p class="p2"> <i>葫芦兄弟</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>网游类 &nbsp;&nbsp;&nbsp;人气：66126</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100111/agent/0"> <p class="p1"><img src="/upload/logo/ldfs_1486972249.png"></p> <p class="p2"> <i>乱斗封神</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>竞速类&nbsp;&nbsp;&nbsp;人气：65333</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100096/agent/0"> <p class="p1"><img src="/upload/logo/wskj_1486970770.png"></p> <p class="p2"> <i>武神空间</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>策略类 &nbsp;&nbsp;&nbsp;人气：63074</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100034/agent/0"> <p class="p1"><img src="/upload/logo/mfwzii_1482978791.png"></p> <p class="p2"> <i>魔法纹章II</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>策略类 &nbsp;&nbsp;&nbsp;人气：62328</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt><dt> <a href="/detail/index/appid/100192/agent/0"> <p class="p1"><img src="/upload/logo/hltcs_1492507131.jpg"></p> <p class="p2"> <i>华丽贪吃蛇</i> <em> <img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"><img src="/public/web/mobile/images/star_1.png"> </em> <span>网游类&nbsp;&nbsp;&nbsp;人气：57746</span> </p> <p class="p3"><span>开始玩</span></p> </a> </dt> </dl> </div> </div> <div id="ajax_idx_more2" rel="2" class="new_morelist">加载更多</div> </div> <script>
    var tab="";
    console.log(tab);
    if(tab==="2"){
        $("#one2 a").click();
    }
</script>   <nav class="bottom_nav"> <ul> <li style="width: 17%;"><a href="http://h5.6533.com" title="手机网页游戏">首页</a></li> <li style="width: 17%;"><a href="/list/wy" title="手机页游">网游</a></li> <li style="width: 17%;"><a href="/dj_list/dj" title="手机游戏大全">单机</a></li> <li style="width: 17%;"><a href="/activity/index" title="手机游戏大全">活动</a></li> <li style="width: 16%;"><a href="/zx/zx_list" title="h5手游资讯">资讯</a></li> <li style="width: 17%;"><a href="/libao/index" title="游戏礼包">礼包</a></li> </ul> </nav> <style>
    .footer img {
        vertical-align: top;
    }
</style>  <footer class="footer"> <div style="clear: both;"></div> <div id="user"> </div> <div> <a href="/ucenter/home">账号：qq52857751 （Suarez）</a>
        &nbsp;<a href="/account/logout">退出</a> </div> <p>    <a style="color: #666666;" href="/contact/aboutus">关于我们</a> <a style="color: #666666;" href="/contact/link">联系我们</a> <a style="color: #666666;" href="/contact/index"><b>游戏合作</b></a> <a style="color: #666666;" href="http://h.6533.com"><b>电脑PC版</b></a> <a style="color: red;" href="http://app.6533.com"><b>APP下载</b></a> </p> <p>  <script charset="utf-8" type="text/javascript" src="http://wpa.b.qq.com/cgi/wpa.php?key=XzkzODA0MTMxNV80NjI2NTNfNDAwMDQ0NjUzM18"></script>  <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=5a0aa3129ffbadca444e1a276291549f0719379b0b719a1883b30c9f2a984702"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="手游福利 玩家群" title="手游福利 玩家群"></a> <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=084cb8e7a04031801507258e6e515af2c7aefcf19324a38d23967d994ddd1225"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="6533在线玩①群" title="6533在线玩①群"></a> </p> <p>辽网文（2016）0861-011号 增值电信业务经营许可证 辽B2-20160187 </p> </footer>  <div class="backtop">返回顶部</div> <div id="hideBackgound_content"></div> <script type="text/javascript">
    ////刷新登录信息
    //$.post("/account/get_user_info",null,function(data){
    //
    //    if(data.code=="OK"){
    //
    //        $("#user").prepend(
    //                '你好，<a href="/ucenter/home">' + data.info.user_name + '</a>| ');
    //    }else{
    //        $("#user").prepend(
    //                '<a href="/account/index">登录</a>&nbsp;|&nbsp;<a href="/account/register/app_id/0/agent/0">注册</a>  ');
    //    }
    //},'json');
</script> <script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?3541a0c9563a6760b75bfd6ed66f01c9";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script> </body></html>