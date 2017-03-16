<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Brif */

$this->title = $model->common_fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'LBL_BRIFS'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brif-view">

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
                    [
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'status',
                        'value' => $model->getStatusName(),
                    ],
                    'common_fullname',
                    'common_domain',
                    'common_contact_fullname',
                    'common_contact_details:ntext',
                    'common_terms',
                    'common_notes:ntext',
                    'company_scope:ntext',
                    'company_features:ntext',
                    'company_competitors:ntext',
                    'company_notes:ntext',
                    'target_audience:ntext',
                    'problem_task:ntext',
                    'problem_action:ntext',
                    'site_parts:ntext',
                    [
                        'attribute' => 'site_i18n',
                        'value' => $model->getSiteI18NName(),
                    ],
                    [
                        'attribute' => 'design_logo_style',
                        'value' => $model->getLogoStyleName(),
                    ],
                    'design_examples:ntext',
                    'design_bad_examples:ntext',
                    'design_effect:ntext',
                    [
                        'attribute' => 'design_style_redesign',
                        'value' => $model->getStyleRedesignName(),
                    ],
                    'design_notes:ntext',
                    [
                        'attribute' => 'content_materials',
                        'value' => $model->getMaterialsName(),
                    ],
                    'content_author',
                    [
                        'attribute' => 'content_photography',
                        'value' => $model->getPhotographyName(),
                    ],
                    'content_manager',
                    'tech_cms',
                    'tech_soft',
                    'tech_pay',
                    [
                        'attribute' => 'tech_mobile',
                        'value' => $model->getMobileName(),
                    ],
                ],
            ]) ?>
        </div>

        <div class="box-footer">
            <?= Yii::t('app', 'LBL_FOOTER') ?>
        </div>

    </div>

</div>
