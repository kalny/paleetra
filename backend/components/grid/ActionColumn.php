<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.11.16
 * Time: 13:00
 */

namespace backend\components\grid;

use yii\helpers\Html;
use Yii;


class ActionColumn extends \yii\grid\ActionColumn
{
    public $template = '{view} {update} {delete}';

    public $contentOptions = [
        'class' => 'action-column',
    ];

    protected function initDefaultButtons()
    {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('app', 'BTN_VIEW'),
                    'aria-label' => Yii::t('app', 'BTN_VIEW'),
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-eye btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('app', 'BTN_UPDATE'),
                    'aria-label' => Yii::t('app', 'BTN_UPDATE'),
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-edit btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('app', 'BTN_DELETE'),
                    'aria-label' => Yii::t('app', 'BTN_DELETE'),
                    'data-confirm' => Yii::t('app', 'MSG_ARE_YOU_SHURE_YOU_WANT_DELETE_THIS_ITEM'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-trash btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }
    }
}