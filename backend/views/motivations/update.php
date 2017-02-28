<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Motivation */

$this->title = Yii::t('app', 'LBL_UPDATE_MOTIVATION') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_MOTIVATIONS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'LBL_UPDATE');
?>
<div class="motivation-update">

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
