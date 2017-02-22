<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<?= $this->render('_header') ?>

<body>

<?php $this->beginBody() ?>

<div id="top"></div>
<div class="wrapper">
    <header class="main-header">

        <div class="top-line">
            <div class="container">
                <div class="row">

                    <a href="/" class="col-md-3 visible-md-block visible-lg-block logo-wrapper">
                        <div class="logo-wrap">
                            <img src="/img/logo.svg" alt="Alt">
                            <span class="logo-descr">Веб студия</span>
                            <span class="logo-title">Палитра</span>
                        </div>
                    </a>

                    <div class="col-md-6 col-sm-8 main-menu">
                        <ul>
                            <li><a href="/#about">О студии</a></li>
                            <li><a href="/#portfolio">Работы</a></li>
                            <li><a href="/#contacts">Контакты</a></li>
                            <li><a href="/#reviews">Отзывы</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-4 phone-wrapper">
                        <div class="phonenumber">
                            <span>+3 8(099) 008 20 17</span>
                            <a class="phoneme-popup-link" href="#phoneme-popup">Перезвоните мне</a>

                            <!-- START POPUP WINDOW -->
                            <div id="phoneme-popup" class="popup-window white-popup mfp-hide">
                                <p class="popup-header">Скажите нам номер вашего телефона, и мы вам перезвоним.</p>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" id="phonenumberfield" class="form-control" name="phone" placeholder="телефон">
                                        <!--<div class="help-block">Необходимо указать номер телефона</div>-->
                                    </div>

                                    <div class="form-group">
                                        <button class="button"><span class="fa fa-phone"></span> Заказать звонок</button>
                                    </div>
                                </form>
                            </div>
                            <!-- END POPUP WINDOW -->

                        </div>
                        <div class="phoneicon"><i class="fa fa-mobile"></i></div>
                        <a id="menubutton" href="#"></a>
                    </div>

                </div>
            </div>

        </div>
    </header>

    <a href="#top" class="control button-up"><i class="fa fa-chevron-circle-up"></i></a>

<?= $content ?>

    <div class="push"></div>
</div>

<?= $this->render('_footer') ?>

<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
        {"src" : "/js/libs.min.js?ver=1.0.13", "async" : false},
        {"src" : "https://use.fontawesome.com/7cebba06a2.js", "async" : true},
        {"src" : "https://buttons.github.io/buttons.js", "async" : true},
        {"src" : "/js/common-page.js?ver=1.0.13", "async" : false},
        {"src" : "/js/ajax.js?ver=1.0.13", "async" : false}
    ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
