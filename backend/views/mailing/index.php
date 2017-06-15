<?php

use backend\components\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'LBL_COMPANIES');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <div class="box">

        <div class="box-header with-border">

            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>

        </div>

        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
               // ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'name',
                    //'description:ntext',
                    //'industries:ntext',
                    //'address',
                    // 'phones',
                    // 'fax',
                     'email:email',
                     'site:url',
                    // 'handled',

                    [
                        'class' => ActionColumn::className(),
                        'template' => '{view}'
                    ],
                ],
            ]); ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>