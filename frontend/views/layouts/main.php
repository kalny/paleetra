<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

//AppAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<?= $this->render('_header') ?>

<body>

<?php $this->beginBody() ?>

<?php

$error = Yii::$app->session->getFlash('error');
$success = Yii::$app->session->getFlash('success');

if (!is_null($error)) {
    echo $this->render('_flash', [
        'message' => $error,
        'error' => true
    ]);
}
if (!is_null($success)) {
    echo $this->render('_flash', [
        'message' => $success,
        'error' => false
    ]);
}

?>

<!-- Header -->
<div id="top"></div>
<header class="main-header">

    <div class="top-line">
        <div class="container">
            <div class="row">

                <div class="col-md-3 visible-md-block visible-lg-block logo-wrapper">
                    <div class="logo-wrap">
                        <img src="img/logo.svg" alt="<?= Html::encode($this->title) ?>">
                        <span class="logo-descr">Веб студия</span>
                        <span class="logo-title"><?= Html::encode($this->params['title_short']) ?></span>
                    </div>
                </div>

                <div class="col-md-6 col-sm-8 main-menu">
                    <ul>
                        <li><a class="control" href="#about">О студии</a></li>
                        <li><a class="control" href="#portfolio">Работы</a></li>
                        <li><a class="control" href="#contacts">Контакты</a></li>
                        <li><a class="control" href="#reviews">Отзывы</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-4 phone-wrapper">
                    <div class="phonenumber">
                        <span><?= Html::encode($this->params['phone']) ?></span>
                        <a class="phoneme-popup-link" href="#phoneme-popup">Перезвоните мне</a>



                        <!-- START POPUP WINDOW -->
                        <div id="phoneme-popup" class="popup-window white-popup mfp-hide">
                            <p class="popup-header">Скажите нам номер вашего телефона, и мы вам перезвоним.</p>

                            <?= $this->render('_phone_form') ?>

                        </div>
                        <!-- END POPUP WINDOW -->

                    </div>
                    <div class="phoneicon"><i class="fa fa-mobile"></i></div>
                    <a id="menubutton" href="#"></a>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-md-6 main-header-content">
                    <h1>ЗАКАЗАТЬ САЙТ ПОД КЛЮЧ</h1>
                    <ul>
                        <li>Уникальный и неповторимый дизайн</li>
                        <li>Адаптивная кроссбраузерная вёрстка</li>
                        <li>Система управления контентом на ваш выбор, или CMS собственной разработки</li>
                    </ul>
                    <div class="super">Мы работаем <span>без предоплаты!</span></div>
                    <a href="#get-site" class="button btn-primary btn-main control">Заказать сайт</a>
                </div>

                <div class="col-md-6 visible-md-block visible-lg-block main-header-image">
                    <img src="img/team.jpg" alt="<?= Html::encode($this->title) ?>" class="img-responsive">
                    <span><?= Html::encode($this->params['title_long']) ?></span>
                </div>

            </div>
        </div>
    </div>
    <div class="arrow-down"><i class="fa fa-angle-double-down"></i></div>
</header>

<a href="#top" class="control button-up"><i class="fa fa-chevron-circle-up"></i></a>

<?= $content ?>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>

<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
        {"src" : "/js/libs.min.js?ver=1.0.13", "async" : false},
        {"src" : "https://use.fontawesome.com/7cebba06a2.js", "async" : true},
        {"src" : "/js/common.js?ver=1.0.13", "async" : false},
        {"src" : "/js/ajax.js?ver=1.0.14", "async" : false}
    ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->
</body>
</html>
<?php $this->endPage() ?>
