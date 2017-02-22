<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.02.17
 * Time: 10:25
 */

namespace frontend\models;


class Price extends \common\models\Price
{
    public function getPricedDescription()
    {
        return str_replace('%%', $this->volume, $this->description);
    }
}