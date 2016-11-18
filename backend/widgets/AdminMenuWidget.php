<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 10.11.2015
 * Time: 11:58
 */

namespace backend\widgets;


use yii\base\Widget;

class AdminMenuWidget extends Widget
{

    public $controller;

    public $action;

    public $data;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('adminMenu', [
            'controller' => $this->controller,
            'action' => $this->action,
            'data' => $this->data,
        ]);
    }

}