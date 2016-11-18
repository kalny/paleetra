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
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', ['options' => [
            'tag' => 'div',
            'class' => 'form-group field-loginform-username has-feedback required'
        ],
        'template' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}{hint}'])
        ->textInput(['placeholder' => 'Username'])?>

        <?= $form->field($model, 'password', ['options' => [
            'tag' => 'div',
            'class' => 'form-group field-loginform-password has-feedback required',
        ],
        'template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}{hint}'])
        ->textInput(['placeholder' => 'Password', 'type' => 'password'])?>


        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="rememberMe"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


