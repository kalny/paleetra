<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 13:49
 */

namespace backend\models;


class Call extends \common\models\Call
{
    public static function getNew()
    {
        return self::find()->where(['status' => self::STATUS_NEW])->orderBy(['created_at' => SORT_DESC]);
    }
}