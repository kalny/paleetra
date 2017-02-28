<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Step */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="step-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'BTN_SAVE'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
