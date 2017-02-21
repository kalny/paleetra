<?php

namespace common\models;


/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $photo
 */
class Contact extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }
}
