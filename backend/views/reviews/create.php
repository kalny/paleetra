<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Review */

$this->title = Yii::t('app', 'LBL_CREATE_REVIEW');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_REVIEWS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-create">

    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>

        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
