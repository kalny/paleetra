<?php

use backend\components\grid\PosActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_WORKS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_CREATE_WORK'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

            </div>
        </div>

        <div class="box-body">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    [
                        'attribute' => 'category_id',
                        'filter' => Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                        'value' => 'category.title',
                    ],
                    //'slug',
                    'title',
                    //'description:ntext',
                    //'sources',
                    // 'demo',
                    ['class' => PosActionColumn::className()],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>