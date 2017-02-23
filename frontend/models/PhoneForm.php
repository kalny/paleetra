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

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'string', 'max' => 20],
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