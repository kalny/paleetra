<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 27.02.17
 * Time: 9:17
 */

namespace backend\components\grid;

use backend\models\Task;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;


class TaskActionColumn extends ActionColumn
{
    public $template = '{view} {update} {delete} {drive}';

    private $route = 'tasks/';

    protected function initDefaultButtons()
    {
        parent::initDefaultButtons();

        if (!isset($this->buttons['drive'])) {
            $this->buttons['drive'] = function ($url, $model, $key) {

                $status = $model->status;

                switch ($status) {
                    case Task::STATUS_ACTIVE : {
                        $action = 'stop';
                        $title = 'LBL_PAUSE';
                        $icon = 'fa-pause';

                    } break ;
                    case Task::STATUS_STOPPED : {
                        $action = 'start';
                        $title = 'LBL_START';
                        $icon = 'fa-play';

                    } break ;
                    case Task::STATUS_COMPLETE : {
                        $action = null;
                        $title = 'LBL_COMPLETE';
                        $icon = 'fa-calendar-check-o';

                    } break ;
                }

                $url = (is_null($action)) ? null : Url::to([$this-> route . $action, 'id' => $model->id]);


                $options = array_merge([
                    'title' => Yii::t('app', $title),
                    'aria-label' => Yii::t('app', $title),
                    'data-pjax' => '0',
                    'data-toggle' => 'tooltip'
                ], $this->buttonOptions);

                return Html::a('<span class="fa ' . $icon . ' btn btn-xs btn-default btn-flat"></span>', $url, $options);
            };
        }

    }
}