<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use backend\widgets\Box;

$this->title = Yii::t('app', 'LBL_ROLES');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="roles-index">
    
    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'TTL_CREATE_ROLE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th><?= Yii::t('app', 'LBL_NAME') ?></th>
                    <th><?= Yii::t('app', 'LBL_RULE_NAME') ?></th>
                    <th style="width: 70px"><?= Yii::t('app', 'LBL_ACTIONS') ?></th>
                </tr>
                <?php foreach($roles as $role): ?>
                    <tr>
                        <td><?= $role['name']; ?></td>
                        <td><?= (empty($role['rule_name']))?'-':$role['rule_name']; ?></td>
                        <td>
                            <div class="btn-group">
                                <?= Html::a('<span class="fa fa-eye btn btn-xs btn-default btn-flat"></span>', ['view', 'name' => $role['name']], ['data-toggle' => 'tooltip', 'title' => Yii::t('app', 'LBL_VIEW')]) ?>
                                <?= Html::a('<span class="fa fa-trash btn btn-xs btn-default btn-flat"></span>', ['delete', 'name' => $role['name']], [
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