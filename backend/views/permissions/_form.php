<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Permission;
use backend\models\AuthRule;

/* @var $this yii\web\View */
/* @var $model common\models\Permission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(
        ArrayHelper::map(Permission::findParents(), 'name', 'name'),
        ['prompt' => Yii::t('app', 'LBL_NO_PARENT')]
    ) ?>

    <?php if ($model->isNewRecord): ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'rule_name')->dropDownList(
        ArrayHelper::map(AuthRule::find()->all(), 'name', 'name'),
        ['prompt' => Yii::t('app', 'LBL_NO_RULE')]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'BTN_CREATE') : Yii::t('app', 'BTN_UPDATE'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat' : 'btn btn-primary btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
