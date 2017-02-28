<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 28.02.17
 * Time: 9:36
 */

namespace backend\models;

use Yii;
use yii\web\UploadedFile;


class Motivation extends \common\models\Motivation
{
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';

    public $svgFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'color'], 'required'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['color'], 'string', 'max' => 8],
            [['title'], 'unique'],
            [['svgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'svg', 'checkExtensionByMimeType' => false, 'on' => self::SCENARIO_ADMIN_CREATE],
            [['svgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg', 'checkExtensionByMimeType' => false, 'on' => self::SCENARIO_ADMIN_UPDATE],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['title', 'description', 'color', 'svgFile'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['title', 'description', 'color', 'svgFile'];
        return $scenarios;
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
            'color' => Yii::t('app', 'LBL_COLOR'),
            'svgFile' => Yii::t('app', 'LBL_IMAGE'),
        ];
    }

    public static function checkAccept()
    {
        return self::find()->count() < 3;
    }

    public function beforeValidate()
    {
        $this->svgFile = UploadedFile::getInstance($this, 'svgFile');

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->svgFile) {

                $this->deleteImage();

                $randomString = Yii::$app->getSecurity()->generateRandomString(10);

                $path = Yii::getAlias('@webroot/upload/files/') . $randomString . '.' . $this->svgFile->extension;
                $this->svgFile->saveAs($path);

                $url = '/upload/files/' . $randomString . '.' . $this->svgFile->extension;

                //add svg image
                $this->image = $url;
            }

            return true;
        }

        return false;
    }

    public function beforeDelete()
    {
        //delete svg image
        $this->deleteImage();

        return parent::beforeDelete();
    }

    private function deleteImage()
    {
        $path = Yii::getAlias('@webroot/') . $this->image;

        if (file_exists($path) && (!empty($this->image))) {
            unlink($path);
        }
    }
}