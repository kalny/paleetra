<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Trust */

$this->title = Yii::t('app', 'LBL_UPDATE_TRUST') . ': ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_TRUSTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'LBL_UPDATE');
?>
<div class="trust-update">

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
