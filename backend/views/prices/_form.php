<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Price */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'BTN_CREATE') :  Yii::t('app', 'BTN_UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
