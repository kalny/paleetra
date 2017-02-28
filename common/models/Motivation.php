<?php

namespace common\models;

/**
 * This is the model class for table "motivation".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $color
 */
class Motivation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motivation';
    }
}
