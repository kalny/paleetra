<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Brif */

$this->title = Yii::t('app', 'LBL_CREATE_BRIF');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_BRIFS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brif-create">

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
