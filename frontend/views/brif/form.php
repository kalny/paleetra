<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 16.03.17
 * Time: 9:40
 */

/* @var $this yii\web\View */
/* @var $model \frontend\models\Brif */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::$app->params['title_short'] . ': Бриф';
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
            <h1 class="inner-header">Бриф на разработку сайта</h1>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

        <div class="col-sm-4">

            <div class="sidepanel">
                Бриф — краткая письменная форма согласительного порядка между планирующими сотрудничать сторонами, в которой прописываются основные параметры будущего программного, графического, медийного или какого-либо иного проекта.
            </div>
        </div>
    </div>
</div>
