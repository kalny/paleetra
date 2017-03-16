<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin(); ?>

<h2>Общая информация</h2>

<?= $form->field($model, 'common_fullname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'common_domain')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'common_contact_fullname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'common_contact_details')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'common_terms')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'common_notes')->textarea(['maxlength' => true, 'rows' => 4]) ?>

<h2>Информация о компании</h2>
<?= $form->field($model, 'company_scope')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'company_features')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'company_competitors')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'company_notes')->textarea(['maxlength' => true, 'rows' => 4]) ?>

<h2>Целевая аудитория</h2>
<?= $form->field($model, 'target_audience')->textarea(['maxlength' => true, 'rows' => 4]) ?>

<h2>Постановка задачи</h2>
<?= $form->field($model, 'problem_task')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'problem_action')->textarea(['maxlength' => true, 'rows' => 4]) ?>

<h2>Содержание сайта</h2>
<?= $form->field($model, 'site_parts')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'site_i18n')->dropDownList(\frontend\models\Brif::getYesNoArray()) ?>

<h2>Дизайн</h2>
<?= $form->field($model, 'design_logo_style')->dropDownList(\frontend\models\Brif::getLsArray()) ?>
<?= $form->field($model, 'design_examples')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'design_bad_examples')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'design_effect')->textarea(['maxlength' => true, 'rows' => 4]) ?>
<?= $form->field($model, 'design_style_redesign')->dropDownList(\frontend\models\Brif::getRzArray()) ?>
<?= $form->field($model, 'design_notes')->textarea(['maxlength' => true, 'rows' => 4]) ?>

<h2>Контент</h2>
<?= $form->field($model, 'content_materials')->dropDownList(\frontend\models\Brif::getMaterialsArray()) ?>
<?= $form->field($model, 'content_author')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'content_photography')->dropDownList(\frontend\models\Brif::getYesNoArray()) ?>
<?= $form->field($model, 'content_manager')->textInput(['maxlength' => true]) ?>

<h2>Технические требования</h2>
<?= $form->field($model, 'tech_cms')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'tech_soft')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'tech_pay')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'tech_mobile')->dropDownList(\frontend\models\Brif::getYesNoArray()) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить бриф', ['class' => 'button btn-primary btn-main']) ?>
</div>

<?php ActiveForm::end(); ?>
