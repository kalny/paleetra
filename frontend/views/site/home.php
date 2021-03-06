<?php

/* @var $this yii\web\View */
/* @var $motivations \frontend\models\Motivation[] */
/* @var $trusts \frontend\models\Trust[] */
/* @var $step \frontend\models\Step */
/* @var $prices \frontend\models\Price[] */
/* @var $categories \frontend\models\Category[] */
/* @var $works \frontend\models\Work[] */
/* @var $contacts \frontend\models\Contact[] */
/* @var $reviews \frontend\models\Review[] */
/* @var $articles \frontend\models\Article[] */

use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use frontend\models\Article;

$this->title = Yii::$app->params['title'];
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

<!-- Animation -->
<section id="animation" class="section-dark section-no-triangle">
    <div class="main-animation">
        <iframe width="784" height="441" src="https://www.youtube.com/embed/HzPEdzw0Wpk" frameborder="0" allowfullscreen></iframe>
    </div>
</section>

<!-- Section 1 -->
<section id="for-what" class="section-light">
    <header>
        <h2>Зачем вам нужен сайт</h2>
        <p>Что вам даст владение сайтом, и стоит ли тратить на это деньги</p>
    </header>
    
    <div class="container">
        <div class="row">
            <?php foreach ($motivations as $motivation) : ?>
            <div class="col-md-4">
                <div class="card" style="background-color: <?= $motivation->color ?>">
                    <h3><?= $motivation->title ?></h3>
                    <div class="img-wrapper">
                        <img src="<?= $motivation->image ?>" alt="<?= $motivation->title ?>">
                    </div>
                    <p><?= $motivation->description ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 2 -->
<section id="about" class="section-semi-dark section-no-triangle parallax-window section-parallax" data-parallax="scroll" data-image-src="img/parallax_g.jpg">
    <header>
        <h2>Почему заказать сайт вам следует у нас</h2>
    </header>

    <div class="container">
        <?php foreach ($trusts as $trust) : ?>
        <div class="point fade-in-up-block">
            <p><?= $trust->description ?></p>
            <div class="point-svg">
                <img src="<?= $trust->image ?>" alt="Преимущество">
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Section 3 -->
<section id="features" class="section-dark">
    <header>
        <h2>Особенности рабочего процесса</h2>
    </header>

    <div class="container">
        <div class="timeline-wrapper">
            <div class="vline"></div>
            <ul>
                <?php foreach ($step->stepsArray as $stepItem) : ?>
                    <li><span class="fade-in-right-block"><?= $stepItem ?></span></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<!-- Section 4 -->
<section id="prices" class="section-light">
    <header>
        <h2>Цена</h2>
        <p>Сколько стоит заказать сайт под ключ</p>
        <p class="header-note">При формировании стоимости определяются необходимые в конкретном случае работы и суммируется их цены.</p>
    </header>

    <div class="price-wrapper">
        <?php $counter = 0; foreach($prices as $price) : $counter++; ?>
            <?php if ($counter % 2 !== 0) : ?>
                <div class="price-item">
                    <div class="container fade-in-left-block">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="price-content price-content-left">
                                    <?= $price->pricedDescription ?>
                                </div>
                            </div>
                            <div class="col-md-4 visible-md-block visible-lg-block price-label price-label-left">
                                <div class="price-label-wrapper">
                                    <span>$<?= $price->volume ?></span>
                                    <p><?= $price->title ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.77 80.66">
                            <path class="a" d="M575.57,2139.09a24.57,24.57,0,0,1,3.25,5.29h1.33a28.39,28.39,0,0,1,3.51-5.55,57.09,57.09,0,0,1,6.31-6.41v-2.22a33.52,33.52,0,0,0-8.93,5.69v-72.17h-2.92v72.17q-2.77-2.2-4.13-3.06t-4.8-2.57v2.19a57.39,57.39,0,0,1,6.37,6.65" transform="translate(-569.2 -2063.71)"/>
                        </svg>
                    </div>
                </div>
             <?php else : ?>
                <div class="price-item">
                    <div class="container fade-in-right-block">
                        <div class="row">
                            <div class="col-md-4 visible-md-block visible-lg-block price-label price-label-right">
                                <div class="price-label-wrapper">
                                    <span>$<?= $price->volume ?></span>
                                    <p><?= $price->title ?></p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="price-content price-content-right">
                                    <?= $price->pricedDescription ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="price-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.77 80.66">
                            <path class="a" d="M575.57,2139.09a24.57,24.57,0,0,1,3.25,5.29h1.33a28.39,28.39,0,0,1,3.51-5.55,57.09,57.09,0,0,1,6.31-6.41v-2.22a33.52,33.52,0,0,0-8.93,5.69v-72.17h-2.92v72.17q-2.77-2.2-4.13-3.06t-4.8-2.57v2.19a57.39,57.39,0,0,1,6.37,6.65" transform="translate(-569.2 -2063.71)"/>
                        </svg>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="container">
        <p>Как видите, цена разработки составляется из множества факторов, поэтому навскидку её определить довольно сложно. Для примера, стоимость одностраничного лендинга на Wordpress с уникальным дизайном и адаптивной кроссбраузерной версткой рассчитывается так:</p>
        <p class="price-calc">
            <?php $summary = 0; $counter = 0; foreach ($prices as $price) : $counter++; $summary += $price->volume ?>
                <?= $price->title ?> (<?= $price->volume ?>) <?= ($counter === count($prices)) ? '=' : '+' ?>
            <?php endforeach; ?>
        </p>
        <p class="price-result">$<?= $summary ?></p>
    </div>
</section>

<!-- Section 5 -->
<section id="portfolio" class="section-dark">
    <header>
        <h2>Портфолио</h2>
        <p>Последние работы нашей студии</p>
    </header>

    <div class="container">
        <div class="row">
            <div class="filter_div controls">
                <ul>
                    <li class="filter active" data-filter="all">Все работы</li>
                    <?php foreach ($categories as $category) : ?>
                     <li class="filter" data-filter=".category-<?= $category->id ?>"><?= $category->title ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div id="portfolio_grid">
                <?php foreach ($works as $work): ?>
                    <div class="mix col-md-3 col-sm-6 portfolio-item category-<?= $work->category->id ?>">
                        <img src="<?= $work->getImage()->getUrl('500x') ?>" alt="<?= $work->title ?>">
                        <div class="port-item-cont">
                            <h3><?= $work->titleShort ?></h3>
                            <p><?= $work->descriptionShort ?></p>
                            <a href="<?= Url::to(['portfolio/view', 'slug' => $work->slug]) ?>" >Посмотреть</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 6 -->
<section id="contacts" class="section-semi-dark">
    <header>
        <h2>Команда</h2>
        <p>С кем можно связаться</p>
    </header>

    <div class="container">
        <div class="contacts-wrapper">
            <?php foreach ($contacts as $contact) : ?>
            <div class="contact-item fade-in-up-block">
                <div class="img-wrapper"><img class="img-responsive" src="<?= $contact->getImage('400x')->getUrl() ?>" alt="<?= $contact->name ?>"></div>
                <h3><?= $contact->name ?></h3>
                <p class="description"><?= $contact->position ?></p>
                <p><span><?= $contact->phone ?></span></p>
                <p><?= $contact->email ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Section 7 -->
<section id="reviews" class="section-light">
    <header>
        <h2>Отзывы наших клиентов</h2>
    </header>

    <div class="container">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="slider">
                <?php foreach ($reviews as $review) : ?>
                <div class="slide">
                    <div class="imgbox"><img src="<?= $review->getImage('150x')->getUrl() ?>" alt="<?= $review->name ?>"></div>
                    <h3><?= $review->name ?></h3>
                    <p class="client-description"><?= $review->position ?></p>
                    <p class="client-review"><?= $review->body ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Section 8 -->
<section id="articles" class="section-dark">
    <header>
        <h2>Публикации нашей студии</h2>
        <p>На нашем сайте время от времени мы публикуем статьи, новости и акции.</p>
    </header>

    <div class="container">
        <div class="articles-container">
            <div class="row">
                <?php foreach($articles as $article) : ?>
                <div class="col-sm-4">
                    <div class="article-card">
                        <h3><?= $article->name ?></h3>
                        <div class="img-wrap"><img src="<?= $article->getImage() ?>" alt="<?= $article->name ?>" class="img-responsive"></div>
                        <p class="body"><?= HtmlPurifier::process($article->short_anonce) ?></p>
                        <p><a href="<?= Url::to(['articles/view', 'slug' => $article->slug]) ?>">Читать полностью »</a></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <a href="<?= Url::to(['articles/index']) ?>" class="button btn-primary btn-main">Все публикации</a>
    </div>
</section>


<!-- Section 9 -->
<section id="get-site" class="section-semi-dark">
    <header>
        <h2>Заказать сайт сейчас</h2>
        <p>Итак, если вы готовы стать владельцем сайта - напишите нам.</p>
    </header>

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?= $this->render('_order_form') ?>
        </div>
    </div>
</section>