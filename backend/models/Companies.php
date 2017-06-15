<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 15.06.17
 * Time: 9:03
 */

namespace backend\models;

use Yii;


class Companies extends \common\models\Companies
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
            [['name'], 'required'],
            [['description', 'industries'], 'string'],
            [['handled'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['address', 'email', 'site'], 'string', 'max' => 256],
            [['phones', 'fax'], 'string', 'max' => 128],
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
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'industries' => Yii::t('app', 'LBL_INDUSTRIES'),
            'address' => Yii::t('app', 'LBL_ADDRESS'),
            'phones' => Yii::t('app', 'LBL_PHONES'),
            'fax' => Yii::t('app', 'LBL_FAX'),
            'email' => Yii::t('app', 'LBL_EMAIL'),
            'site' => Yii::t('app', 'LBL_SITE'),
            'handled' => Yii::t('app', 'LBL_HANDLED'),
        ];
    }

    public function getInds()
    {
        return $this->hasMany(Industries::className(), ['id' => 'industry_id'])->viaTable('companies_industries', ['company_id' => 'id']);
    }
}