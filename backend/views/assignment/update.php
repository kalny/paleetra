<?php

use yii\helpers\Html;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = Yii::t('app', 'LBL_UPDATE_ASSIGNMENT') . ': ' . $model->item_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_ASSIGNMENTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'LBL_UPDATE');
?>
<div class="auth-assignment-update">
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
