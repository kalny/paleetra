<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use common\components\MailHelper;

/**
 * This is the model class for table "call".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $phone
 * @property integer $status
 */
class Call extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'call';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['created_at'], 'integer'],
            [['phone'], 'string', 'max' => 20],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_NEW],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'created_at' => Yii::t('app', 'LBL_CREATED_AT'),
            'phone' => Yii::t('app', 'LBL_PHONE'),
            'status' => Yii::t('app', 'LBL_STATUS'),
        ];
    }

    const STATUS_NEW = 0;
    const STATUS_COMPLETE = 1;

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'LBL_NEW'),
            self::STATUS_COMPLETE => Yii::t('app', 'LBL_COMPLETE'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        //Send mail
        $body = "Перезвоните клиенту - " . $this->phone;
        MailHelper::sendMail(Yii::$app->params['adminEmail'], Yii::$app->params['supportEmail'], "Перезвоните!", $body);
        
        parent::afterSave($insert, $changedAttributes);
    }
}
