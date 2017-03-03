<?php

/* @var $this yii\web\View */
/* @var $lastArticles \frontend\models\Article[] */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use frontend\models\Article;
use yii\widgets\ListView;

$this->title = Yii::$app->params['title_short'] . ': Статьи';
$this->params['title_short'] = Yii::$app->params['title_short'];
$this->params['phone'] = Yii::$app->params['phone'];

$this->params['description'] = Yii::$app->params['description'];
$this->params['keywords'] = Yii::$app->params['keywords'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];

$this->params['og_image'] = '';
$this->params['og_title'] = $this->title;
$this->params['og_description'] = $this->params['description'];
?>

<div class="container">
    <div class="row">


        <div class="col-sm-8">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_anonce',
                'layout' => "{items}\n{pager}",
            ]); ?>
        </div>

        <div class="col-sm-4">
            <div class="sidepanel">
                Последние статьи на сайте:
                <ul>
                    <?php foreach ($lastArticles as $art): ?>
                        <li><a href="<?= Url::to(['articles/view', 'slug' => $art->slug]) ?>"><?= $art->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="<?= \yii\helpers\Url::to(['site/home', '#'=>'get-site']) ?>" class="button btn-primary btn-main">Заказать сайт</a>
        </div>
    </div>
</div>