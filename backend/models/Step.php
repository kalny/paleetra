<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 28.02.17
 * Time: 14:09
 */

namespace backend\models;

use Yii;


class Step extends \common\models\Step
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
        ];
    }
}