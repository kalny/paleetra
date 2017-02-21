<?php

use backend\components\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\components\grid\SetColumn;
use backend\models\Order;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_ORDERS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_CREATE_ORDER'),
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
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'date_from',
                            'attribute2' => 'date_to',
                            'type' => DatePicker::TYPE_RANGE,
                            'separator' => '-',
                            'pluginOptions' => ['format' => 'yyyy-mm-dd']
                        ]),
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                    ],
                    'phone',
                    'email:email',
                    //'body:ntext',
                    [
                        'class' => SetColumn::className(),
                        'filter' => Order::getStatusesArray(),
                        'attribute' => 'status',
                        'name' => 'statusName',
                        'cssCLasses' => [
                            Order::STATUS_NEW => 'warning',
                            Order::STATUS_PROCESS => 'success',
                            Order::STATUS_COMPLETE => 'default',
                        ],
                    ],
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