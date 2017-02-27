<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 27.02.17
 * Time: 9:55
 */

namespace backend\models;


trait MovingUpDown
{
    public function moveUp()
    {
        $currentPos = $this->pos;

        //work in top
        if ($currentPos <= 1) {
            if ($currentPos < 1) {
                $this->pos = 1;
                $this->save();
            }
            return true;
        }

        //find previous work
        $prev = self::find()->where('pos < ' . $currentPos)->orderBy('pos DESC')->limit(1)->one();

        //Moving
        $this->pos = $prev->pos;
        $prev->pos = $currentPos;

        $this->save();
        $prev->save();

        return true;
    }

    public function moveDown()
    {
        $currentPos = $this->pos;

        $maxPos = self::find()->orderBy('pos DESC')->limit(1)->one()->pos;

        //work in bottom
        if ($currentPos >= $maxPos) {
            if ($currentPos > $maxPos) {
                $this->pos = $maxPos;
                $this->save();
            }
            return true;
        }

        //find next work
        $next = self::find()->where('pos > ' . $currentPos)->orderBy('pos ASC')->limit(1)->one();

        //Moving
        $this->pos = $next->pos;
        $next->pos = $currentPos;

        $this->save();
        $next->save();

        return true;
    }

    public function moveEnd()
    {
        $maxPos = self::find()->orderBy('pos DESC')->limit(1)->one()->pos;

        //Moving
        $this->pos = $maxPos + 1;
        $this->save();

        return true;
    }

}