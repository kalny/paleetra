<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 7:51
 */

namespace frontend\models;


use yii\base\Model;

class PhoneForm extends Model
{
    public $phone;

    public $reCaptcha;

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'string', 'max' => 20],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LdVAhcUAAAAAGWEk54Zcn_Kqn1W-zWTthszmCij', 'uncheckedMessage' => 'Пожалуйста, подтвердите что вы не бот.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Телефон',
        ];
    }
}