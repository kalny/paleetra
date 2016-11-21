<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthRule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_AUTH_RULES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-rule-view">
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">
                <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->name], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_UPDATE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->name], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_DELETE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip',
                    'data' => [
                        'confirm' => Yii::t('app', 'MSG_ARE_YOU_SHURE_YOU_WANT_DELETE_THIS_ITEM'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'data:ntext',
                    'created_at:date',
                    'updated_at:date',
                ],
            ]) ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>
</div>
