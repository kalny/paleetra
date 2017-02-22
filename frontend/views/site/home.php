<?php

/* @var $this yii\web\View */
/* @var $prices \frontend\models\Price[] */
/* @var $categories \frontend\models\Category[] */
/* @var $works \frontend\models\Work[] */
/* @var $contacts \frontend\models\Contact[] */
/* @var $reviews \frontend\models\Review[] */

use yii\helpers\Url;

$this->title = Yii::$app->params['title'];
$this->params['title_short'] = Yii::$app->params['title_short'];
$this->params['title_long'] = Yii::$app->params['title_long'];
$this->params['phone'] = Yii::$app->params['phone'];

$this->params['vk_link'] = Yii::$app->params['vk_link'];
$this->params['fb_link'] = Yii::$app->params['fb_link'];
$this->params['tw_link'] = Yii::$app->params['tw_link'];
?>

<!-- Section 1 -->
<section id="for-what" class="section-light section-no-triangle">
    <header>
        <h2>Зачем вам нужен сайт</h2>
        <p>Что вам даст владение сайтом, и стоит ли тратить на это деньги</p>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="background-color: #0b305b">
                    <h3>Информация</h3>
                    <div class="img-wrapper">
                        <img src="img/information.svg" alt="Информация">
                    </div>
                    <p>Одним из важнейших условий успешного бизнеса является наличие места для регулярного размещения актуальной информации о компании. Вам необходим  ресурс, где можно опубликовать подробные сведения о предоставляемых услугах, условиях заказа, контактах и реквизитах.</p>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card" style="background-color: #33765c">
                    <h3>Клиенты</h3>
                    <div class="img-wrapper">
                        <img src="img/clients.svg" alt="Клиенты">
                    </div>
                    <p>Количество пользователей сети стремительно растет. Нельзя пренебрегать огромной аудиторией потенциальных клиентов, которые ищут в интернете ваши товары или услуги.</p>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card" style="background-color: #752100">
                    <h3>Имидж</h3>
                    <div class="img-wrapper">
                        <img src="img/imidge.svg" alt="Имидж">
                    </div>
                    <p>Наличие сайта свидетельствует о престиже компании и готовности соответствовать современным трендам. Не стоит оставлять это преимущество вашим конкурентам – заказать сайт под ключ вы можете прямо сейчас.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2 -->
<section id="about" class="section-semi-dark section-no-triangle parallax-window section-parallax" data-parallax="scroll" data-image-src="img/parallax_g.jpg">
    <header>
        <h2>Почему заказать сайт вам следует у нас</h2>
    </header>

    <div class="container">
        <div class="point fade-in-up-block">
            <p>Мы выполняем работу добросовестно. Мы внимательно относимся к деталям, творчески подходим к  выполнению задач.</p>
            <div class="point-svg">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 11.01L18 11c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h5c.55 0 1-.45 1-1v-9c0-.55-.45-.99-1-.99zM23 20h-5v-7h5v7zM20 2H2C.89 2 0 2.89 0 4v12c0 1.1.89 2 2 2h7v2H7v2h8v-2h-2v-2h2v-2H2V4h18v5h2V4c0-1.11-.9-2-2-2zm-8.03 7L11 6l-.97 3H7l2.47 1.76-.94 2.91 2.47-1.8 2.47 1.8-.94-2.91L15 9h-3.03z"/>
                </svg>
            </div>
        </div>
        <div class="point fade-in-up-block">
            <p>Мы используем в своей работе последние технологии, признанные в  IT сообществе. Мы не изобретаем велосипеды, работаем быстро и качественно.</p>
            <div class="point-svg">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 18c0 .55.45 1 1 1h1v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h2v3.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V19h1c.55 0 1-.45 1-1V8H6v10zM3.5 8C2.67 8 2 8.67 2 9.5v7c0 .83.67 1.5 1.5 1.5S5 17.33 5 16.5v-7C5 8.67 4.33 8 3.5 8zm17 0c-.83 0-1.5.67-1.5 1.5v7c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5v-7c0-.83-.67-1.5-1.5-1.5zm-4.97-5.84l1.3-1.3c.2-.2.2-.51 0-.71-.2-.2-.51-.2-.71 0l-1.48 1.48C13.85 1.23 12.95 1 12 1c-.96 0-1.86.23-2.66.63L7.85.15c-.2-.2-.51-.2-.71 0-.2.2-.2.51 0 .71l1.31 1.31C6.97 3.26 6 5.01 6 7h12c0-1.99-.97-3.75-2.47-4.84zM10 5H9V4h1v1zm5 0h-1V4h1v1z"/>
                </svg>
            </div>
        </div>
        <div class="point fade-in-up-block">
            <p>Уникальный и неповторимый дизайн наши специалисты создадут с учетом всех ваших пожеланий.</p>
            <div class="point-svg">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"/>
                </svg>
            </div>
        </div>
        <div class="point fade-in-up-block">
            <p>Мы работаем без предоплаты.</p>
            <div class="point-svg">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                </svg>
            </div>
        </div>
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
                <li><span class="fade-in-right-block">Мы общаемся с клиентом, выясняем основные моменты.</span></li>
                <li><span class="fade-in-right-block">Составляем техзадание, если его нет у заказчика.</span></li>
                <li><span class="fade-in-right-block">Прорабатываем структуру проекта, создаем схематические макеты.</span></li>
                <li><span class="fade-in-right-block">Дизайнер создает макет, на этом этапе формируется внешний вид.</span></li>
                <li><span class="fade-in-right-block">Верстальщик превращает макеты в веб страницы.</span></li>
                <li><span class="fade-in-right-block">Сверстанные страницы передаются программистам для интеграции с CMS</span></li>
                <li><span class="fade-in-right-block">Сайт размещается на хостинге, тестируется.</span></li>
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
                        <img src="<?= $work->getImage()->getUrl() ?>" alt="<?= $work->title ?>">
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
        <h2>Контакты</h2>
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
<section id="get-site" class="section-semi-dark">
    <header>
        <h2>Заказать сайт сейчас</h2>
        <p>Итак, если вы готовы стать владельцем сайта - напишите нам.</p>
    </header>

    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <form class="order-form" action="page.html">
                <input class="form-control" type="text" name="phone" required placeholder="Телефон">
                <input class="form-control" type="email" name="email" required placeholder="Email">
                <textarea class="form-control" name="message" rows="7" placeholder="Коротко опишите задачу" required></textarea>
                <button class="button btn-primary btn-main">Отправить заявку</button>
            </form>
        </div>
    </div>
</section>