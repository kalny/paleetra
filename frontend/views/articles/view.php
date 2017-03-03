<?php

/* @var $this yii\web\View */
/* @var $article \frontend\models\Article */
/* @var $lastArticles \frontend\models\Article[] */

use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use frontend\models\Article;

$this->title = Yii::$app->params['title_short'] . ': ' . $article->name;
$this->params['title_short'] = Yii::$app->params['title_short'];
$this->params['phone'] = Yii::$app->params['phone'];

$this->params['description'] = (!empty($article->seo_description)) ? $article->seo_description : Yii::$app->params['description'];
$this->params['keywords'] = (!empty($article->seo_keywords)) ? $article->seo_keywords : Yii::$app->params['keywords'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];

$host = 'http://' . $_SERVER['HTTP_HOST'];
$pageUrl = $host . Url::to(['articles/view', 'slug' => $article->slug]);
$pageImage = $article->getImage();
$pageImage = (empty($pageImage)) ? '' : $host . $pageImage;

$this->params['og_image'] = $pageImage;
$this->params['og_title'] = $this->title;
$this->params['og_description'] = $this->params['description'];
?>

<div class="container">
    <div class="row">


        <div class="col-sm-8">
            <h1 class="inner-header"><?= $article->name ?></h1>
            <?= HtmlPurifier::process($article->getBody(Article::CT_ALL)) ?>
            <p>Поделиться ссылкой:</p>
            <div class="social-panel">
                <a class="sb-vk share-button" href="http://vk.com/share.php?url=<?= $pageUrl ?>" target="_blank" title="Поделиться с друзьями ВКонтакте"><i class="fa fa-vk"></i></a>
                <a class="sb-fb share-button" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?= $pageUrl ?>" target="_blank" title="Опубликовать на Facebook"><i class="fa fa-facebook"></i></a>
                <a class="sb-tw share-button" href="http://twitter.com/share?url=<?= $pageUrl ?>&counturl=<?= $pageUrl ?>" target="_blank" title="Написать в Twitter"><i class="fa fa-twitter"></i></a>
            </div>
        </div>

        <div class="col-sm-4">

            <div class="sidepanel">
                Последние публикации на сайте:
                <ul>
                    <?php foreach ($lastArticles as $art): ?>
                        <li><a href="<?= Url::to(['articles/view', 'slug' => $art->slug]) ?>"><?= $art->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="sidepanel">
                Вы также можете просмотреть <a href="<?= Url::to(['articles/index']) ?>">список всех публикаций</a>
            </div>
            <a href="<?= \yii\helpers\Url::to(['site/home', '#'=>'get-site']) ?>" class="button btn-primary btn-main">Заказать сайт</a>
        </div>
    </div>
</div>