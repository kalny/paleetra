<?php

namespace common\models;

use common\components\MailHelper;
use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $phone
 * @property string $email
 * @property string $body
 * @property integer $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
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
            [['phone', 'email', 'body'], 'required'],
            [['created_at'], 'integer'],
            [['body'], 'string'],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'email'],

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
            'email' => Yii::t('app', 'LBL_EMAIL'),
            'body' => Yii::t('app', 'LBL_CONTENT'),
            'status' => Yii::t('app', 'LBL_STATUS'),
        ];
    }

    const STATUS_NEW = 0;
    const STATUS_PROCESS = 1;
    const STATUS_COMPLETE = 2;

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'LBL_NEW'),
            self::STATUS_PROCESS => Yii::t('app', 'LBL_PROCESS'),
            self::STATUS_COMPLETE => Yii::t('app', 'LBL_COMPLETE'),
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        //Send mail
        MailHelper::sendMail($this->email, Yii::$app->params['supportEmail'], "Новый заказ - " . $this->phone, $this->body);
        
        parent::afterSave($insert, $changedAttributes);
    }
}
