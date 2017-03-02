<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\InnerAsset;

InnerAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('_header') ?>
<body>
<?php $this->beginBody() ?>

<!-- Header -->
<div id="top"></div>
<div class="wrapper">
    <header class="main-header">

        <div class="top-line">
            <div class="container">
                <div class="row">

                    <a href="/" class="col-md-3 visible-md-block visible-lg-block logo-wrapper">
                        <div class="logo-wrap">
                            <img src="/img/logo.svg" alt="<?= Html::encode($this->title) ?>">
                            <span class="logo-descr">Веб студия</span>
                            <span class="logo-title"><?= Html::encode($this->params['title_short']) ?></span>
                        </div>
                    </a>

                    <div class="col-md-6 col-sm-8 main-menu">
                        <ul>
                            <li><a class="control" href="<?= \yii\helpers\Url::to(['site/home', '#'=>'about']) ?>">О студии</a></li>
                            <li><a class="control" href="<?= \yii\helpers\Url::to(['site/home', '#'=>'portfolio']) ?>">Работы</a></li>
                            <li><a class="control" href="<?= \yii\helpers\Url::to(['site/home', '#'=>'contacts']) ?>">Контакты</a></li>
                            <li><a class="control" href="<?= \yii\helpers\Url::to(['site/home', '#'=>'reviews']) ?>">Отзывы</a></li>
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
        </div>
    </header>

    <a href="#top" class="control button-up"><i class="fa fa-chevron-circle-up"></i></a>

    <?= $this->render('_flash') ?>

    <?= $content ?>

    <div class="push"></div>

</div><!-- Wrapper -->

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
