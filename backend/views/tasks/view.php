<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */
/* @var $completedCompanies integer */
/* @var $allCompanies integer */
/* @var $errors integer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_TASKS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">
                <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_UPDATE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

                <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_DELETE'),
                    'type' => 'button',
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
                    //'id',
                    'created_at:datetime',
                    'name',
                    'description:ntext',
                    [
                        'attribute' => 'status',
                        'value' => $model->getStatusName(),
                    ],
                    'rate',
                    //'content:ntext',
                ],
            ]) ?>
        </div>

    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'LBL_PROGRESS') ?></h3>
        </div>

        <div class="box-body">
            <i>Учитываются предприятия, у которых есть Email, но нет сайта</i><br>
            Всего предприятий: <?= $allCompanies ?><br>
            Обработано: <?= $completedCompanies ?>
            (<?= floor ($completedCompanies / ($allCompanies / 100)) ?>%)<br>
            Ошибок: <?= $errors ?>
        </div>

    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'LBL_LETTER') ?></h3>
        </div>

        <div class="box-body">
            <h3><?= $model->subject ?></h3><br>
            <?= $model->content ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
