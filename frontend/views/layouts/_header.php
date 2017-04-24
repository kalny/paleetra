<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.02.17
 * Time: 10:03
 */

use yii\helpers\Html;

?>
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta name="description" content="<?= Html::encode($this->params['description']) ?>">
    <meta name="keywords" content="<?= Html::encode($this->params['keywords']) ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:image" content="<?= Html::encode($this->params['og_image']) ?>">
    <meta property="og:title" content="<?= Html::encode($this->params['og_title']) ?>">
    <meta property="og:description" content="<?= Html::encode($this->params['og_description']) ?>">

    <link rel="shortcut icon" href="img/favicon/favicon.ico?v=1.0.0" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png?v=1.0.0">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png?v=1.0.0">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png?v=1.0.0">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#000">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#000">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">

    <meta name="yandex-verification" content="db7e25c77c950e61" />

    <?php $this->head() ?>

</head>

<body>
<?php $this->beginBody() ?>

<!--LiveInternet counter--><script type="text/javascript">
    new Image().src = "//counter.yadro.ru/hit?r"+
        escape(document.referrer)+((typeof(screen)=="undefined")?"":
        ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
        ";"+Math.random();</script><!--/LiveInternet-->
