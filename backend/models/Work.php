<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 21.02.17
 * Time: 14:48
 */

namespace backend\models;

use Yii;
use yii\web\UploadedFile;


class Work extends \common\models\Work
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
            [['slug', 'title', 'description'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['slug', 'title', 'sources', 'demo'], 'string', 'max' => 255],
            [['title_short', 'description_short'], 'string', 'max' => 100],
            [['slug'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_ADMIN_CREATE],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_ADMIN_UPDATE],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['slug', 'title', 'description', 'sources', 'demo', 'category_id', 'image', 'title_short', 'description_short'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['slug', 'title', 'description', 'sources', 'demo', 'category_id', 'image', 'title_short', 'description_short'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'slug' => Yii::t('app', 'LBL_SLUG'),
            'title' => Yii::t('app', 'LBL_TITLE'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'sources' => Yii::t('app', 'LBL_SOURCES'),
            'demo' => Yii::t('app', 'LBL_DEMO'),
            'category_id' => Yii::t('app', 'LBL_CATEGORY'),
            'image' => Yii::t('app', 'LBL_IMAGE'),
            'title_short' => Yii::t('app', 'LBL_SHORT_TITLE'),
            'description_short' => Yii::t('app', 'LBL_SHORT_DESCRIPTION'),
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