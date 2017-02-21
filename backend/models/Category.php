<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 14:21
 */

namespace backend\models;

use Yii;

class Category extends \common\models\Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
        ];
    }
}