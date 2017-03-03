<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.02.17
 * Time: 10:03
 */

use yii\helpers\Html;

?>

<footer>
    <div class="container">
        <div class="row">
            <div class="visible-sm-block visible-md-block visible-lg-block col-sm-6 col-md-6">
                <div class="logo-wrap">
                    <img src="/img/logo.svg" alt="<?= Html::encode($this->title) ?>">
                    <span class="logo-descr">Веб студия</span>
                    <span class="logo-title"><?= Html::encode($this->params['title_short']) ?></span>
                </div>
                <div style="width: 1px; height: 1px; opacity: 0; overflow: hidden;">
                    <!--LiveInternet logo--><a href="//www.liveinternet.ru/click"
                                               target="_blank"><img src="//counter.yadro.ru/logo?29.1"
                                                                    title="LiveInternet: number of visitors and pageviews is shown"
                                                                    alt="" border="0" width="88" height="120"/></a><!--/LiveInternet-->
                </div>

            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="social-buttons">
                    <a href="<?= Html::encode($this->params['vk_link']) ?>" class="social-button sb-vk" target="_blank"><i class="fa fa-vk"></i></a>
                    <a href="<?= Html::encode($this->params['fb_link']) ?>" class="social-button sb-fb" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="<?= Html::encode($this->params['tw_link']) ?>" class="social-button sb-tw" target="_blank"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
