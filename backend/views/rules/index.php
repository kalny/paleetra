<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\Box;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AuthRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_AUTH_RULES');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-rule-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'LBL_CREATE_AUTH_RULE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th><?= Yii::t('app', 'LBL_NAME') ?></th>
                    <th><?= Yii::t('app', 'LBL_DATA') ?></th>
                    <th style="width: 70px"><?= Yii::t('app', 'LBL_ACTIONS') ?></th>
                </tr>
                <?php foreach($rules as $rule): ?>
                    <tr>
                        <td><?= $rule['name']; ?></td>
                        <td><?= (empty($rule['data']))?'-':$rule['data']; ?></td>
                        <td>
                            <div class="btn-group">
                                <?= Html::a('<span class="fa fa-eye btn btn-xs btn-default btn-flat"></span>', ['view', 'id' => $rule['name']], ['title' => Yii::t('app', 'LBL_VIEW'), 'data-toggle' => 'tooltip']) ?>
                                <?= Html::a('<span class="fa fa-trash btn btn-xs btn-default btn-flat"></span>', ['delete', 'id' => $rule['name']], [
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
