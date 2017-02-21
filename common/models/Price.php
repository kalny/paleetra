<?php

namespace common\models;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $volume
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }
}
