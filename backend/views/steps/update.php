<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

/* @var $model backend\models\Step */

$this->title = Yii::t('app', 'LBL_UPDATE_PROCESS');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="process-update">

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