<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 15.06.17
 * Time: 9:37
 */

namespace backend\models;

use Yii;


class Industries extends \common\models\Industries
{
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbParser');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'name' => Yii::t('app', 'LBL_NAME'),
        ];
    }
}