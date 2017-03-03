<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use backend\components\behaviors\SluggableBehavior;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $content
 */
class Article extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'transliterator' => 'Russian-Latin/BGN; NFKD',
                'forceUpdate' => false
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content'], 'required'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 250],
            ['slug', 'unique', 'targetClass' => self::className(), 'message' => Yii::t('app', 'MES_THIS_SLUG_HAS_ALREADY_BEEN_TAKEN')],
            ['slug', 'string', 'max' => 255],
            [['seo_description'], 'string'],
            [['seo_keywords'], 'string'],
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
            'content' => Yii::t('app', 'LBL_CONTENT'),
            'slug' => Yii::t('app', 'LBL_SLUG'),
            'seo_description' => Yii::t('app', 'LBL_SEO_DESCRIPTION'),
            'seo_keywords' => Yii::t('app', 'LBL_SEO_KEYWORDS'),
        ];
    }

    const CT_ANONCE = 0;
    const CT_UNDERCUT = 1;
    const CT_ALL = 2;

    private $delimiter = '===';

    public function getBody($contentType)
    {
        $content = explode($this->delimiter, $this->content, 2);

        if (count($content) > 1) {
            $anonce = $content[0];
            $undercut = $content[1];
        } else {
            $anonce = $content[0];
            $undercut = '';
        }

        switch ($contentType) {
            case self::CT_ALL : {
                return $anonce . $undercut;
                break;
            }
            case self::CT_ANONCE : {
                return $anonce;
                break;
            }
            case self::CT_UNDERCUT : {
                return $undercut;
                break;
            }
        }
    }
}
