<?php

namespace common\models;



/**
 * This is the model class for table "industries".
 *
 * @property integer $id
 * @property string $name
 */
class Industries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'industries';
    }
}
