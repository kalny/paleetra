<?php

use yii\helpers\Html;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $model common\models\Permission */

$this->title = Yii::t('app', 'LBL_CREATE_PERMISSION');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_PERMISSIONS'), 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-create">

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
