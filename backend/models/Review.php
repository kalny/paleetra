<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 11:38
 */

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

class Review extends \common\models\Review
{
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';

    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position', 'body'], 'required'],
            [['body'], 'string'],
            [['name', 'position'], 'string', 'max' => 150],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_ADMIN_CREATE],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_ADMIN_UPDATE],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['name', 'position', 'body', 'image'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['name', 'position', 'body', 'image'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'name' => Yii::t('app', 'LBL_NAME'),
            'position' => Yii::t('app', 'LBL_POSITION'),
            'body' => Yii::t('app', 'LBL_CONTENT'),
            'image' => Yii::t('app', 'LBL_PHOTO'),
        ];
    }

    public function beforeValidate()
    {
        $this->image = UploadedFile::getInstance($this, 'image');

        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->image) {

            $images = $this->getImages();
            foreach ($images as $img) {
                $this->removeImage($img);
            }

            $path = Yii::getAlias('@webroot/upload/files/') . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
        }

    }

    public function beforeDelete()
    {
        $images = $this->getImages();
        foreach ($images as $img) {
            $this->removeImage($img);
        }
        return parent::beforeDelete();
    }

}