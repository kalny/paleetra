<?php

namespace common\models;

/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $industries
 * @property string $address
 * @property string $phones
 * @property string $fax
 * @property string $email
 * @property string $site
 * @property integer $handled
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }
}
