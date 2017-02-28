<?php

use backend\components\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MotivationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_MOTIVATIONS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivation-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_CREATE_MOTIVATION'),
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
                    'title',
                    //'description:ntext',
                    //'color',

                    ['class' => ActionColumn::className()],
                ],
            ]); ?>
            <?php Pjax::end(); ?>        
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>