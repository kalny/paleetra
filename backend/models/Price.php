<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 8:09
 */

namespace backend\models;

use Yii;


class Price extends \common\models\Price
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['volume'], 'integer'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'title' => Yii::t('app', 'LBL_TITLE'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'volume' => Yii::t('app', 'LBL_VOLUME'),
        ];
    }
}