<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Work */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_WORKS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-view">

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
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'slug',
                    'title',
                    'description:ntext',
                    'sources',
                    'demo',
                    [
                        'attribute' => 'category_id',
                        'value' => $model->category->title,
                    ],
                ],
            ]) ?>
            <img class="img-responsive" src="<?= $model->getImage()->getUrl() ?>" alt="">
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
