<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\Pjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<?$cart = \frontend\models\OrderProducts::find()->where(['order_id' => Yii::$app->session->get('order_id')])->count()
;?>



<div class="wrap">


    <?php
    NavBar::begin([
        'brandLabel' => 'ДрайвМакс',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-white navbar-fixed-top',
        ],
        'renderInnerContainer' => true,
        'innerContainerOptions' => ['class' => 'container-fluid'],


    ]);
    $menuItems = [

        ['label' =>  'Корзина  (' . $cart . ')', 'url' => ['catalog/cart'], 'linkOptions' => ['class' => 'menu-item', 'data-pjax' => 0]],
    ];
    Pjax::begin(['enablePushState' => false, 'options' => ['id' => 'cart-button-pjax']]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-basket navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    Pjax::end();

    echo Html::tag(
        'form',
        Html::tag('input',"",['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Код или наименование...']) .
        Html::tag('span','',['class' => 'nav-search-icon glyphicon glyphicon-search']),
        ['class' => 'navbar-form navbar-right']);


    echo Html::tag('div', Html::tag('div',
        Html::img('@web/images/mts.jpg', ['width' => 20]) . ' ' .
        Html::tag('span', '(050)46-36-136') . ' ' .
        Html::img('@web/images/ks.jpg', ['width' => 20]) . ' ' .
        Html::tag('span', '(067)108-49-49') . ' ' .
        Html::img('@web/images/lifecell.jpg', ['width' => 20]) . ' ' .
        Html::tag('span', '(063)789-95-34 >>') .

        Html::tag('div', Html::tag('div', 'ICQ: 209909926<br>email: order@drivemax.com.ua<br>skype: drivemax',
            ['class' => 'c-bubble c-bubble--bottom', 'data-toggle' => 'popover', 'data-placement' => 'bottom',
                'data-content' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus']) , ['class' => 'contacts-bubble'])

        , ['class' => 'navbar-phone navbar-nav navbar-right']));

    NavBar::end();
    ?>


    <div class="container-fluid">
        <div class="row main-block">
            <div id='sidebar' class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <div class="nav-sidebar-label">Навигация</div>
                    <li><a href="<?=Url::to('@web/');?>">
                            <span class="glyphicon glyphicon-tasks"></span>
                            Кузов и оптика
                        </a></li>
                    <li><a href="<?=Url::to('@web/glass');?>"><span class="glyphicon glyphicon-tasks"></span>Стекла</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-tasks"></span>Лампочки</a></li>
                </ul>

                <div class="line"></div>

                <ul class="nav nav-sidebar">
                    <div class="nav-sidebar-label">Услуги</div>

                    <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Ремонт стекол</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Шлифовка стекол под линзы</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Изготовление автомобильных столиков</a></li>
                </ul>

                <div class="line"></div>

                <ul class="nav nav-sidebar">
                    <div class="nav-sidebar-label">Меню</div>
                    <li><a href=""><span class="glyphicon glyphicon-home"></span>Главная</a></li>
                    <li><a href="<?=Url::to('/site/about');?>"><span class="glyphicon glyphicon-transfer"></span>Доставка и оплата</a></li>

                    <li><a href="#"><span class="glyphicon glyphicon-repeat"></span>Политика возврата</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span>Контактная информация</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>О нас</a></li>
                </ul>

            </div>
            <div class="col-sm-9 col-sm-offset-5 col-md-10 col-md-offset-2 main">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>

                <?= $content ?>
            </div>
            <footer class="footer col-sm-9 col-sm-offset-5 col-md-10 col-md-offset-2">

                <p class="pull-left">&copy; Автомагазин "ДрайвМакс" <?= date('Y') ?></p>


            </footer>
        </div>
    </div>




</div>





<?php $this->endBody() ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-87986073-1', 'auto');
    ga('send', 'pageview');

</script>



</body>
</html>
<?php $this->endPage() ?>
