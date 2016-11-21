<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthAssignmentSearch */

$this->title = Yii::t('app', 'LBL_ASSIGNMENTS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">
    
    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_CREATE_ASSIGNMENT'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th><?= Yii::t('app', 'LBL_USER') ?></th>
                    <th><?= Yii::t('app', 'LBL_ROLE') ?></th>
                    <th style="width: 90px"><?= Yii::t('app', 'LBL_ACTIONS') ?></th>
                </tr>
                <?php foreach($assignments as $assignment): ?>
                    <tr>

                        <td><?= $assignment->user->username; ?></td>
                        <td><?= $assignment->item_name; ?></td>
                        <td>
                            <div class="btn-group">
                                <?= Html::a('<span class="fa fa-eye btn btn-xs btn-default btn-flat"></span>', ['view', 'item_name' => $assignment->item_name, 'user_id' => $assignment->user_id], ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'LBL_VIEW')]) ?>
                                <?= Html::a('<span class="fa fa-pencil btn btn-xs btn-default btn-flat"></span>', ['update', 'item_name' => $assignment->item_name, 'user_id' => $assignment->user_id], ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'LBL_UPDATE')]) ?>
                                <?= Html::a('<span class="fa fa-trash btn btn-xs btn-default btn-flat"></span>', ['delete', 'item_name' => $assignment->item_name, 'user_id' => $assignment->user_id], [
                                    'data-toggle' => 'tooltip',
                                    'title' => Yii::t('app', 'LBL_DELETE'),
                                    'data' => [
                                        'confirm' => Yii::t('app', 'MSG_ARE_YOU_SHURE_YOU_WANT_DELETE_THIS_ITEM'),
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>
</div>
