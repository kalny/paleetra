<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Review */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_REVIEWS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">
                <?= Html::a('<i class="fa fa-edit"></i>', ['update', 'id' => $model->id], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'LBL_UPDATE'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

                <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'LBL_DELETE'),
                    'type' => 'button',
                    'data' => [
                        'confirm' => Yii::t('app', 'MSG_ARE_YOU_SHURE_YOU_WANT_DELETE_THIS_ITEM'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="box-body">
            <img src="<?= $model->getImage()->getUrl('400x') ?>" alt="">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'position',
                    'body:ntext',
                ],
            ]) ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
