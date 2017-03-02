<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('_header') ?>
<body>
<?php $this->beginBody() ?>

<!-- Header -->
<div id="top"></div>
<header class="main-header">

    <div class="top-line">
        <div class="container">
            <div class="row">

                <div class="col-md-3 visible-md-block visible-lg-block logo-wrapper">
                    <div class="logo-wrap">
                        <img src="/img/logo.svg" alt="<?= Html::encode($this->title) ?>">
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
                        <span>+3 8(099) 008 20 17</span>
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
                    <img src="/img/team.jpg" alt="<?= Html::encode($this->title) ?>" class="img-responsive">
                    <span><?= Html::encode($this->params['title_long']) ?></span>
                </div>

            </div>
        </div>
    </div>
    <div class="arrow-down"><i class="fa fa-angle-double-down"></i></div>
</header>

<a href="#top" class="control button-up"><i class="fa fa-chevron-circle-up"></i></a>

<?= $this->render('_flash') ?>

<?= $content ?>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
