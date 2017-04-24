<?php

/* @var $this yii\web\View */
/* @var $contacts \frontend\models\Contact[] */

use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use frontend\models\Article;

$this->title = Yii::$app->params['title_short'] . ': Контакты';
$this->params['title_short'] = Yii::$app->params['title_short'];
$this->params['title_long'] = Yii::$app->params['title_long'];
$this->params['phone'] = Yii::$app->params['phone'];

$this->params['description'] = Yii::$app->params['description'];
$this->params['keywords'] = Yii::$app->params['keywords'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];

$this->params['og_image'] = '';
$this->params['og_title'] = $this->title;
$this->params['og_description'] = Yii::$app->params['description'];
?>

<div class="container">
    <div class="row">


        <div class="col-sm-8">
            <h1 class="inner-header">Контакты</h1>
            <p><?= Yii::$app->params['address'] ?></p>
            <p><?= $this->params['phone'] ?></p>
            <iframe src="https://api-maps.yandex.ua/frame/v1/-/C6eiAXmj" style="width: 100%; height: 300px;" frameborder="0"></iframe>

        </div>

        <div class="col-sm-4">
            <div class="sidepanel">

                <h4>Дополнительная информация:</h4>

                <?php foreach ($contacts as $contact): ?>



                    <p>
                        <?= $contact->name ?>, <?= $contact->position ?>:<br>

                        <?= $contact->phone ?><br>
                        <a href="mailto:<?= $contact->email ?>"><?= $contact->email ?></a>
                    </p>



                <?php endforeach; ?>

            </div>
            <a href="<?= \yii\helpers\Url::to(['site/home', '#'=>'get-site']) ?>" class="button btn-primary btn-main">Заказать сайт</a>
        </div>
    </div>
</div>
