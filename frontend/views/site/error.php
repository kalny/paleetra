<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$this->context->layout = 'error_layout';

?>

<div class="container">
    <h1 style="color: #333"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>Во время обработки страницы произошла ошибка.</p>
    <p>Если вы считаете, что это ошибка сервера, пожалуйста, свяжитесь с нами.</p>
    <p><a href="<?= Url::to(['site/home']) ?>">Перейти на главную</a></p>
</div>
