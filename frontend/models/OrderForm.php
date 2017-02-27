<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.02.17
 * Time: 7:51
 */

namespace frontend\models;


use yii\base\Model;

class OrderForm extends Model
{
    public $phone;
    public $email;
    public $body;

    public $reCaptcha;

    public function rules()
    {
        return [
            [['phone', 'email', 'body'], 'required'],
            [['phone'], 'string', 'max' => 20],
            [['body'], 'string'],
            [['email'], 'email'],
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
            'email' => 'Email',
            'body' => 'Коротко опишите задачу',
        ];
    }
}