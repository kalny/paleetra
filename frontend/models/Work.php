<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.02.17
 * Time: 10:49
 */

namespace frontend\models;


class Work extends \common\models\Work
{
    public function getTitleShort()
    {
        return (empty($this->title_short)) ? $this->title : $this->title_short;
    }

    public function getDescriptionShort()
    {
        return (empty($this->description_short)) ? $this->getTitleShort() : $this->description_short;
    }
}