<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Call */

$this->title = Yii::t('app', 'LBL_CREATE_CALL');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_CALLS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-create">

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
