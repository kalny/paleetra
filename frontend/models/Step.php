<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 28.02.17
 * Time: 14:41
 */

namespace frontend\models;


class Step extends \common\models\Step
{
    private $parDelimiter = "\r\n";
    
    public function getStepsArray()
    {
        $stepsRaw = $this->description;
        $stepsArray = explode($this->parDelimiter, $stepsRaw);

        return $stepsArray;
    }
}