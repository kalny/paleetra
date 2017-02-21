<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 12:32
 */

namespace backend\models;




class Order extends \common\models\Order
{
    public static function getNew()
    {
        return self::find()->where(['status' => self::STATUS_NEW])->orderBy(['created_at' => SORT_DESC]);
    }
}