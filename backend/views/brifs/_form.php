<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Brif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList(\backend\models\Brif::getStatusesArray()) ?>

    <?= $form->field($model, 'common_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'common_domain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'common_contact_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'common_contact_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'common_terms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'common_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_scope')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_competitors')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'company_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'target_audience')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'problem_task')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'problem_action')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'site_parts')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'site_i18n')->dropDownList(\backend\models\Brif::getYesNoArray()) ?>

    <?= $form->field($model, 'design_logo_style')->dropDownList(\backend\models\Brif::getLsArray()) ?>

    <?= $form->field($model, 'design_examples')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'design_bad_examples')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'design_effect')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'design_style_redesign')->dropDownList(\backend\models\Brif::getRzArray()) ?>

    <?= $form->field($model, 'design_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_materials')->dropDownList(\backend\models\Brif::getMaterialsArray()) ?>

    <?= $form->field($model, 'content_author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_photography')->dropDownList(\backend\models\Brif::getYesNoArray()) ?>

    <?= $form->field($model, 'content_manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_cms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_soft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_pay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tech_mobile')->dropDownList(\backend\models\Brif::getYesNoArray()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'BTN_CREATE') : Yii::t('app', 'BTN_UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
