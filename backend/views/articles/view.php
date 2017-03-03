<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_ARTICLES'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'LBL_METADATA') ?></h3>

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
                    'name',
                    'slug',
                    'seo_description',
                    'seo_keywords',
                    'description',
                ],
            ]) ?>
        </div>

    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Yii::t('app', 'LBL_CONTENT') ?></h3>
        </div>

        <div class="box-body">
            <?= $model->content ?>
        </div>

    </div>

</div>
