<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_ASSIGNMENTS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-view">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">
                <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_UPDATE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>
                <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
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
                    'item_name',
                    'user.username',
                    'created_at:date'
                ],
            ]) ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>
</div>
