<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 27.02.17
 * Time: 9:17
 */

namespace backend\components\grid;

use Yii;
use yii\helpers\Html;


class PosActionColumn extends ActionColumn
{
    public $template = '{view} {update} {delete} {move-up} {move-down}';

    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();

        if (!isset($this->buttons['move-up'])) {
            $this->buttons['move-up'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('app', 'BTN_UP'),
                    'aria-label' => Yii::t('app', 'BTN_UP'),
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);
                return Html::a('<span class="fa  fa-arrow-up btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }

        if (!isset($this->buttons['move-down'])) {
            $this->buttons['move-down'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('app', 'BTN_DOWN'),
                    'aria-label' => Yii::t('app', 'BTN_DOWN'),
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);
                return Html::a('<span class="fa  fa-arrow-down btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }


    }
}