<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 02.03.17
 * Time: 9:25
 */

namespace common\components;

use Yii;


class MailHelper
{
    public static function sendMail($from, $to, $subject, $body)
    {
        $mail = Yii::$app->mailer->compose();

        $mail->setTo($to)
            ->setFrom([$from => $from])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();
    }
}