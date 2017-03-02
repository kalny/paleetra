<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.02.17
 * Time: 10:49
 *
 *
 * @property string[] $paragraphesArray
 */

namespace frontend\models;


class Work extends \common\models\Work
{
    private $parDelimiter = "\r\n";

    public function getTitleShort()
    {
        return (empty($this->title_short)) ? $this->title : $this->title_short;
    }

    public function getDescriptionShort()
    {
        return (empty($this->description_short)) ? $this->getTitleShort() : $this->description_short;
    }
    
    public function getParagraphesArray()
    {
        $paragraphesRaw = $this->description;
        $paragraphesArray = explode($this->parDelimiter, $paragraphesRaw);

        return $paragraphesArray;
    }

    public function getSocialDescription()
    {
        return str_replace("\r\n", " ", $this->description);
    }
}