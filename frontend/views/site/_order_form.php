<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 12:22
 */

/* @var $model \frontend\models\OrderForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(isset($this->context->orderForm) && $this->context->orderForm != null)
{
    $model = $this->context->orderForm;
}
else{
    $model = new \frontend\models\OrderForm();
}

?>

<?php $form = ActiveForm::begin([
    'action' => ['feedback/order'],
    'id' => 'order_form'
]); ?>

<?= $form->field($model, 'phone', ['template'=>'{input}{error}'])->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel( 'phone' )]) ?>

<?= $form->field($model, 'email', ['template'=>'{input}{error}'])->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel( 'email' )]) ?>

<?= $form->field($model, 'body', ['template'=>'{input}{error}'])->textarea(['maxlength' => true, 'placeholder' => $model->getAttributeLabel( 'body' ), 'rows' => 7]) ?>

<?//= $form->field($model, 'reCaptcha', ['template'=>'{input}{error}'])->widget(
    //\himiklab\yii2\recaptcha\ReCaptcha::className(),
    //['siteKey' => '6LdVAhcUAAAAAAQ8O9U9Y5b6hUFh3CuD4IgQANOY']
//) ?>

    <div id="reCaptcha1"></div>

<div class="form-group">
    <?= Html::submitButton('Отправить заявку', ['class' => 'button btn-primary btn-main']) ?>
</div>

<?php ActiveForm::end(); ?>