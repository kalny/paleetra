<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $rate
 * @property string $content
 *
 * @property State[] $states
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
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
            [['name', 'description', 'content'], 'required'],
            [['created_at', 'rate'], 'integer'],
            [['description', 'content'], 'string'],
            [['name'], 'string', 'max' => 255],

            ['rate', 'default', 'value' => 1],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
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
            'name' => Yii::t('app', 'LBL_NAME'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'status' => Yii::t('app', 'LBL_STATUS'),
            'rate' => Yii::t('app', 'LBL_RATE'),
            'content' => Yii::t('app', 'LBL_CONTENT'),
        ];
    }

    const STATUS_ACTIVE = 0;
    const STATUS_STOPPED = 1;
    const STATUS_COMPLETE = 2;

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'LBL_ACTIVE'),
            self::STATUS_STOPPED => Yii::t('app', 'LBL_STOPPED'),
            self::STATUS_COMPLETE => Yii::t('app', 'LBL_COMPLETE'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::className(), ['task_id' => 'id']);
    }
    
    public function stop()
    {
        $this->status = self::STATUS_STOPPED;
        $this->save();
    }

    public function start()
    {
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }
}
