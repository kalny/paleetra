<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BrifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'common_fullname') ?>

    <?= $form->field($model, 'common_domain') ?>

    <?php // echo $form->field($model, 'common_contact_fullname') ?>

    <?php // echo $form->field($model, 'common_contact_details') ?>

    <?php // echo $form->field($model, 'common_terms') ?>

    <?php // echo $form->field($model, 'common_notes') ?>

    <?php // echo $form->field($model, 'company_scope') ?>

    <?php // echo $form->field($model, 'company_features') ?>

    <?php // echo $form->field($model, 'company_competitors') ?>

    <?php // echo $form->field($model, 'company_notes') ?>

    <?php // echo $form->field($model, 'target_audience') ?>

    <?php // echo $form->field($model, 'problem_task') ?>

    <?php // echo $form->field($model, 'problem_action') ?>

    <?php // echo $form->field($model, 'site_parts') ?>

    <?php // echo $form->field($model, 'site_i18n') ?>

    <?php // echo $form->field($model, 'design_logo_style') ?>

    <?php // echo $form->field($model, 'design_examples') ?>

    <?php // echo $form->field($model, 'design_bad_examples') ?>

    <?php // echo $form->field($model, 'design_effect') ?>

    <?php // echo $form->field($model, 'design_style_redesign') ?>

    <?php // echo $form->field($model, 'design_notes') ?>

    <?php // echo $form->field($model, 'content_materials') ?>

    <?php // echo $form->field($model, 'content_author') ?>

    <?php // echo $form->field($model, 'content_photography') ?>

    <?php // echo $form->field($model, 'content_manager') ?>

    <?php // echo $form->field($model, 'tech_cms') ?>

    <?php // echo $form->field($model, 'tech_soft') ?>

    <?php // echo $form->field($model, 'tech_pay') ?>

    <?php // echo $form->field($model, 'tech_mobile') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
