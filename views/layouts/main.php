<?php
//namespace backend\views\layouts;
///* @var $this \yii\web\View */
///* @var $content string */
//use Yii;
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\widgets\BgSubMenu;
use backend\widgets\BgMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <META HTTP-EQUIV="Access-Control-Allow-Origin" CONTENT="http://img.suarez.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' => '管理系统',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'nav navbar-inverse',
        ],
        'innerContainerOptions' => [
            'class' => 'container-fluid'
        ]
    ]);
//    if (Yii::$app->user->isGuest) {
//        $menuItems = [];
//    } else {
//        $menuItems = [
//            ['label' => 'Home', 'url' => ['/site/index'],],
//            ['label' => '设置', 'url' => ['/bguser/index'],'active' => (isset($this->params['activeMenu']) && $this->params['activeMenu'] == 'bgSet')]
//        ];
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                '退出 (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
    echo BgMenu::widget();
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
//                echo BgSubMenu::widget(
//                        [
//                            'activeMenu' => isset($this->params['activeMenu']) ? $this->params['activeMenu']:'',
//                            'activeSubMenu' => isset($this->params['activeSubMenu']) ? $this->params['activeSubMenu'] : ''
//                        ]);
                echo BgMenu::widget(['isSubMenu' => true]);
                ?>
            </div>
            <div class="col-sm-9 col-md-10">
                <?= $content ?>
            </div>
        </div>
    </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Suarez <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
