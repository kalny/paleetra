<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 28.02.17
 * Time: 12:58
 */

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

class Trust extends \common\models\Trust
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
            [['description'], 'required'],
            [['description'], 'string'],
            [['svgFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'svg', 'checkExtensionByMimeType' => false, 'on' => self::SCENARIO_ADMIN_CREATE],
            [['svgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg', 'checkExtensionByMimeType' => false, 'on' => self::SCENARIO_ADMIN_UPDATE],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['description', 'svgFile'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['description', 'svgFile'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'svgFile' => Yii::t('app', 'LBL_IMAGE'),
            'image' => Yii::t('app', 'LBL_IMAGE'),
        ];
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

                $path = Yii::getAlias('@webroot/upload/svg/') . $randomString . '.' . $this->svgFile->extension;
                $this->svgFile->saveAs($path);

                $url = '/upload/svg/' . $randomString . '.' . $this->svgFile->extension;

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