<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::$app->params['siteName'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login-logo">
        <a href="/"><b><?= Html::encode($this->title) ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('app', 'MSG_SIGN_IN_TO_START_YOUR_SESSION') ?></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', ['options' => [
            'tag' => 'div',
            'class' => 'form-group field-loginform-username has-feedback required'
        ],
        'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'])
        ->textInput(['placeholder' => Yii::t('app', 'LBL_USERNAME')])?>

        <?= $form->field($model, 'password', ['options' => [
            'tag' => 'div',
            'class' => 'form-group field-loginform-password has-feedback required',
        ],
        'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'])
        ->textInput(['placeholder' => Yii::t('app', 'LBL_PASSWORD'), 'type' => 'password'])?>


        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="rememberMe"> <?= Yii::t('app', 'LBL_REMEMBER_ME') ?>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><?= Yii::t('app', 'BTN_SIGN_IN') ?></button>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


