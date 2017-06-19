<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "state".
 *
 * @property integer $task_id
 * @property integer $company_id
 * @property integer $status
 *
 * @property Task $task
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'company_id'], 'required'],
            [['task_id', 'company_id'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_COMPLETE],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'task_id' => Yii::t('app', 'Task ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'status' => Yii::t('app', 'LBL_STATUS'),
        ];
    }

    const STATUS_COMPLETE = 0;
    const STATUS_ERROR = 1;

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_COMPLETE => Yii::t('app', 'LBL_COMPLETE'),
            self::STATUS_ERROR => Yii::t('app', 'LBL_ERROR'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
