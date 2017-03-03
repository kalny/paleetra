<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 03.03.17
 * Time: 8:41
 */

namespace frontend\models;


class Article extends \common\models\Article
{

    public function getImage()
    {
        $content = $this->content;

        preg_match_all('/<img[^>]+src=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/', $content, $matches);

        if (isset($matches[2][0])) {
            $img = $matches[2][0];
        } else {
            $img = '';
        }

        return $img;
    }
}