<?php
/* @var $works \frontend\models\Work[] */
/* @var $articles \frontend\models\Article[] */
use yii\helpers\Url;
$host = 'http://' . $_SERVER['HTTP_HOST'];
?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $host ?></loc>
        <priority>1.0</priority>
    </url>
    <?php foreach($articles as $article) : ?>
    <url>
        <loc><?= $host ?><?= Url::to(['articles/view', 'slug' => $article->slug]) ?></loc>
    </url>
    <?php endforeach; ?>
    <?php foreach($works as $work) : ?>
    <url>
        <loc><?= $host ?><?= Url::to(['portfolio/view', 'slug' => $work->slug]) ?></loc>
    </url>
    <?php endforeach; ?>
</urlset>
