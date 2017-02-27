<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 7:38
 */

/* @var $model \frontend\models\PhoneForm */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(isset($this->context->phoneForm) && $this->context->phoneForm != null)
{
    $model = $this->context->phoneForm;
}
else{
    $model = new \frontend\models\PhoneForm();
}

?>

<?php $form = ActiveForm::begin([
    'action' => ['feedback/phone'],
    'id' => 'order_phone_form'
]); ?>

<?= $form->field($model, 'phone', ['template'=>'{input}{error}'])->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel( 'phone' )]) ?>

<?//= $form->field($model, 'reCaptcha', ['template'=>'{input}{error}'])->widget(
    //\himiklab\yii2\recaptcha\ReCaptcha::className(),
    //['siteKey' => '6LdVAhcUAAAAAAQ8O9U9Y5b6hUFh3CuD4IgQANOY']
//) ?>

<div id="reCaptcha2"></div>

<div class="form-group">
    <?= Html::submitButton('<span class="fa fa-phone"></span> Заказать звонок', ['class' => 'button']) ?>
</div>

<?php ActiveForm::end(); ?>
