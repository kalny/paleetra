<?php

/* @var $this yii\web\View */
/* @var $work \frontend\models\Work */

use yii\helpers\Url;

$this->title = Yii::$app->params['title_short'] . ': ' . $work->title;
$this->params['title_short'] = Yii::$app->params['title_short'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];

$host = 'http://' . $_SERVER['HTTP_HOST'];
?>

<div class="container">
    <div class="row">


        <div class="col-sm-8">
            <h1 class="inner-header"><?= $work->title ?></h1>
            <p><?= $work->description ?></p>
            <p><img src="<?= $work->getImage()->getUrl() ?>" alt="<?= $work->title ?>" class="img-responsive port-image"></p>
            <p>Поделиться ссылкой:</p>
            <div class="social-panel">
                <script>
                    /*Social*/
                    Share = {
                        vkontakte: function(purl, ptitle, pimg, text) {
                            url  = 'http://vkontakte.ru/share.php?';
                            url += 'url='          + encodeURIComponent(purl);
                            url += '&title='       + encodeURIComponent(ptitle);
                            url += '&description=' + encodeURIComponent(text);
                            url += '&image='       + encodeURIComponent(pimg);
                            url += '&noparse=true';
                            Share.popup(url);
                        },
                        facebook: function(purl, ptitle, pimg, text) {
                            url  = 'http://www.facebook.com/sharer.php?s=100';
                            url += '&p[title]='     + encodeURIComponent(ptitle);
                            url += '&p[summary]='   + encodeURIComponent(text);
                            url += '&p[url]='       + encodeURIComponent(purl);
                            url += '&p[images][0]=' + encodeURIComponent(pimg);
                            Share.popup(url);
                        },
                        twitter: function(purl, ptitle) {
                            url  = 'http://twitter.com/share?';
                            url += 'text='      + encodeURIComponent(ptitle);
                            url += '&url='      + encodeURIComponent(purl);
                            url += '&counturl=' + encodeURIComponent(purl);
                            Share.popup(url);
                        },

                        popup: function(url) {
                            window.open(url,'','toolbar=0,status=0,width=626,height=436');
                        }
                    };
                </script>
                <a class="sb-fb" title="Поделиться на Facebook" onclick="Share.facebook('<?= $host ?><?= Url::to(['portfolio/view', 'slug' => $work->slug]) ?>','<?= $this->title ?>','<?= $host ?><?= $work->getImage()->getUrl() ?>','<?= $work->description ?>')"><i class="fa fa-facebook"></i></a>
                <a class="sb-vk" title="Поделиться с друзьями ВКонтакте" onclick="Share.vkontakte('<?= $host ?><?= Url::to(['portfolio/view', 'slug' => $work->slug]) ?>','<?= $this->title ?>','<?= $host ?><?= $work->getImage()->getUrl() ?>', '<?= $work->description ?>')"><i class="fa fa-vk"></i></a>
                <a class="sb-tw" title="Написать в Twitter" onclick="Share.twitter('<?= $host ?><?= Url::to(['portfolio/view', 'slug' => $work->slug]) ?>','<?= $this->title ?>')"><i class="fa fa-twitter"></i></a>
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