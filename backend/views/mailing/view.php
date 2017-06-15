<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_COMPANIES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

        </div>

        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'name',
                    'description:ntext',
                    //'industries:ntext',
                    'address',
                    'phones',
                    'fax',
                    'email:email',
                    'site:url',
                ],
            ]) ?>
        </div>

    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'LBL_INDUSTRIES') ?></h3>

        </div>

        <div class="box-body">
            <?php foreach ($model->inds as $inustry) : ?>
                <?= $inustry->name ?><br>
            <?php endforeach; ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
