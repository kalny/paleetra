<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 16.03.17
 * Time: 12:30
 */

namespace backend\models;


class Brif extends \common\models\Brif
{
    public static function getNew()
    {
        return self::find()->where(['status' => self::STATUS_NEW])->orderBy(['created_at' => SORT_DESC]);
    }
}