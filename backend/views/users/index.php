<?php

use backend\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\grid\ActionColumn;
use backend\components\grid\SetColumn;
use backend\components\grid\LinkColumn;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_USERS');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

            <div class="box-tools pull-right">

                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], [
                    'class' => 'btn btn-box-tool',
                    'title' => Yii::t('app', 'BTN_CREATE_USER'),
                    'type' => 'button',
                    'data-toggle' => 'tooltip']) ?>

            </div>
        </div>

        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'], 
                        'id',
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
                    [
                        'class' => LinkColumn::className(),
                        'attribute' => 'username',
                    ],
                    'email:email',
                    [
                        'class' => SetColumn::className(),
                        'filter' => User::getStatusesArray(),
                        'attribute' => 'status',
                        'name' => 'statusName',
                        'cssCLasses' => [
                            User::STATUS_ACTIVE => 'success',
                            User::STATUS_WAIT => 'warning',
                            User::STATUS_BLOCKED => 'default',
                        ],
                    ],
                    ['class' => ActionColumn::className()],
                ],
            ]); ?>
         </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>