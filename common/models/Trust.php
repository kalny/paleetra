<?php

namespace common\models;



/**
 * This is the model class for table "trust".
 *
 * @property integer $id
 * @property string $description
 * @property string $image
 */
class Trust extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trust';
    }

    
}
