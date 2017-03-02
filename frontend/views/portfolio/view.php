<?php

/* @var $this yii\web\View */
/* @var $work \frontend\models\Work */

use yii\helpers\Url;

$this->title = Yii::$app->params['title_short'] . ': ' . $work->title;
$this->params['title_short'] = Yii::$app->params['title_short'];
$this->params['phone'] = Yii::$app->params['phone'];

$this->params['description'] = Yii::$app->params['description'];
$this->params['keywords'] = Yii::$app->params['keywords'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];

$host = 'http://' . $_SERVER['HTTP_HOST'];
$pageUrl = $host . Url::to(['portfolio/view', 'slug' => $work->slug]);

$this->params['og_image'] = $host . $work->getImage()->getUrl('500x');
$this->params['og_title'] = $this->title;
$this->params['og_description'] = $work->socialDescription;
?>

<div class="container">
    <div class="row">


        <div class="col-sm-8">
            <h1 class="inner-header"><?= $work->title ?></h1>
            <?php foreach ($work->paragraphesArray as $paragraph) : ?>
                <p><?= $paragraph ?></p>
            <?php endforeach; ?>
            <p><img src="<?= $work->getImage()->getUrl('748x') ?>" alt="<?= $work->title ?>" class="img-responsive port-image"></p>
            <p>Поделиться ссылкой:</p>
            <div class="social-panel">
                <a class="sb-vk" href="http://vk.com/share.php?url=<?= $pageUrl ?>" target="_blank" title="Поделиться с друзьями ВКонтакте"><i class="fa fa-vk"></i></a>
                <a class="sb-fb" href="http://www.facebook.com/sharer.php?s=100&p[url]=<?= $pageUrl ?>" target="_blank" title="Опубликовать на Facebook"><i class="fa fa-facebook"></i></a>
                <a class="sb-tw" href="http://twitter.com/share?url=<?= $pageUrl ?>&counturl=<?= $pageUrl ?>" target="_blank" title="Написать в Twitter"><i class="fa fa-twitter"></i></a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="sidepanel">
                Эта работа находится в категории &laquo;<?= $work->category->title ?>&raquo;
            </div>
            <?php if(!empty($work->sources)) : ?>
            <div class="sidepanel">
                Вы можете посмотреть исходный код данной работы, для этого перейдите по ссылке ниже.
                <p><a aria-label="Watch <?= $work->sources ?> on GitHub" data-count-aria-label="# watchers on GitHub" data-count-api="/repos/<?= $work->sources ?>#subscribers_count" data-count-href="/<?= $work->sources ?>/watchers" data-style="mega" href="https://github.com/<?= $work->sources ?>" class="github-button">Исходники</a></p>
            </div>
            <?php endif; ?>
            <?php if(!empty($work->demo)) : ?>
            <div class="sidepanel">
                Этот проект размещен на сервисе Github Pages, поэтому вы можете <a href="<?= $work->demo ?>" target="_blank">перейти по ссылке</a> и протестировать его работу.
            </div>
            <?php endif; ?>
            <?php if(!empty($work->link)) : ?>
                <div class="sidepanel">
                    Эта работа доступна по сылке: <a href="<?= $work->link ?>" target="_blank"><?= $work->link ?></a>
                </div>
            <?php endif; ?>
            <a href="/" class="button btn-primary btn-main">Заказать сайт</a>
        </div>
    </div>
</div>