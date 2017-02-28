<?php

namespace common\models;



/**
 * This is the model class for table "step".
 *
 * @property integer $id
 * @property string $description
 */
class Step extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'step';
    }
}
