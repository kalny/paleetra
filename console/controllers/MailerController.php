<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 20.06.17
 * Time: 8:09
 */

namespace console\controllers;


use backend\components\Mailer;
use yii\console\Controller;

class MailerController extends Controller
{
    public function actionIndex()
    {
        $mailer = new Mailer();
        $mailer->run();
        
        return 0;
    }
}