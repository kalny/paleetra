<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use common\components\MailHelper;

/**
 * This is the model class for table "brif".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $status
 * @property string $common_fullname
 * @property string $common_domain
 * @property string $common_contact_fullname
 * @property string $common_contact_details
 * @property string $common_terms
 * @property string $common_notes
 * @property string $company_scope
 * @property string $company_features
 * @property string $company_competitors
 * @property string $company_notes
 * @property string $target_audience
 * @property string $problem_task
 * @property string $problem_action
 * @property string $site_parts
 * @property integer $site_i18n
 * @property integer $design_logo_style
 * @property string $design_examples
 * @property string $design_bad_examples
 * @property string $design_effect
 * @property integer $design_style_redesign
 * @property string $design_notes
 * @property integer $content_materials
 * @property string $content_author
 * @property integer $content_photography
 * @property string $content_manager
 * @property string $tech_cms
 * @property string $tech_soft
 * @property string $tech_pay
 * @property integer $tech_mobile
 */
class Brif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brif';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['common_fullname', 'common_contact_fullname', 'common_terms', 'company_scope', 'company_features', 'company_competitors', 'target_audience', 'problem_task', 'problem_action', 'design_examples', 'design_bad_examples', 'design_effect', 'content_author', 'content_manager'], 'required'],
            [['created_at'], 'integer'],
            [['common_contact_details', 'common_notes', 'company_scope', 'company_features', 'company_competitors', 'company_notes', 'target_audience', 'problem_task', 'problem_action', 'site_parts', 'design_examples', 'design_bad_examples', 'design_effect', 'design_notes'], 'string'],
            [['common_fullname', 'common_domain', 'common_contact_fullname', 'common_terms', 'content_author', 'content_manager', 'tech_cms', 'tech_soft', 'tech_pay'], 'string', 'max' => 255],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_NEW],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],

            ['site_i18n', 'integer'],
            ['site_i18n', 'default', 'value' => self::YN_NO],
            ['site_i18n', 'in', 'range' => array_keys(self::getYesNoArray())],

            ['design_logo_style', 'integer'],
            ['design_logo_style', 'default', 'value' => self::LS_NO],
            ['design_logo_style', 'in', 'range' => array_keys(self::getLsArray())],

            ['design_style_redesign', 'integer'],
            ['design_style_redesign', 'default', 'value' => self::RZ_NO],
            ['design_style_redesign', 'in', 'range' => array_keys(self::getRzArray())],

            ['content_materials', 'integer'],
            ['content_materials', 'default', 'value' => self::M_NO],
            ['content_materials', 'in', 'range' => array_keys(self::getMaterialsArray())],

            ['content_photography', 'integer'],
            ['content_photography', 'default', 'value' => self::YN_NO],
            ['content_photography', 'in', 'range' => array_keys(self::getYesNoArray())],

            ['tech_mobile', 'integer'],
            ['tech_mobile', 'default', 'value' => self::YN_NO],
            ['tech_mobile', 'in', 'range' => array_keys(self::getYesNoArray())],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'LBL_ID'),
            'created_at' => Yii::t('app', 'LBL_CREATED_AT'),
            'status' => Yii::t('app', 'LBL_STATUS'),
            'common_fullname' => Yii::t('app', 'LBL_COMMON_FULLNAME'),
            'common_domain' => Yii::t('app', 'LBL_COMMON_DOMAIN'),
            'common_contact_fullname' => Yii::t('app', 'LBL_COMMON_CONTACT_FULLNAME'),
            'common_contact_details' => Yii::t('app', 'LBL_COMMON_CONTACT_DETAILS'),
            'common_terms' => Yii::t('app', 'LBL_COMMON_TERMS'),
            'common_notes' => Yii::t('app', 'LBL_COMMON_NOTES'),
            'company_scope' => Yii::t('app', 'LBL_COMPANY_SCOPE'),
            'company_features' => Yii::t('app', 'LBL_COMPANY_FEATURES'),
            'company_competitors' => Yii::t('app', 'LBL_COMPANY_COMPETITORS'),
            'company_notes' => Yii::t('app', 'LBL_COMPANY_NOTES'),
            'target_audience' => Yii::t('app', 'LBL_TARGET_AUDIENCE'),
            'problem_task' => Yii::t('app', 'LBL_PROBLEM_TASK'),
            'problem_action' => Yii::t('app', 'LBL_PROBLEM_ACTION'),
            'site_parts' => Yii::t('app', 'LBL_SITE_PARTS'),
            'site_i18n' => Yii::t('app', 'LBL_SITE_I18N'),
            'design_logo_style' => Yii::t('app', 'LBL_DESIGN_LOGO_STYLE'),
            'design_examples' => Yii::t('app', 'LBL_DESIGN_EXAMPLES'),
            'design_bad_examples' => Yii::t('app', 'LBL_DESIGN_BAD_EXAMPLES'),
            'design_effect' => Yii::t('app', 'LBL_DESIGN_EFFECT'),
            'design_style_redesign' => Yii::t('app', 'LBL_DESIGN_STYLE_REDESIGN'),
            'design_notes' => Yii::t('app', 'LBL_DESIGN_NOTES'),
            'content_materials' => Yii::t('app', 'LBL_CONTENT_MATERIALS'),
            'content_author' => Yii::t('app', 'LBL_CONTENT_AUTHOR'),
            'content_photography' => Yii::t('app', 'LBL_CONTENT_PHOTOGRAPHY'),
            'content_manager' => Yii::t('app', 'LBL_CONTENT_MANAGER'),
            'tech_cms' => Yii::t('app', 'LBL_TECH_CMS'),
            'tech_soft' => Yii::t('app', 'LBL_TECH_SOFT'),
            'tech_pay' => Yii::t('app', 'LBL_TECH_PAY'),
            'tech_mobile' => Yii::t('app', 'LBL_TECH_MOBILE'),
        ];
    }

    const STATUS_NEW = 0;
    const STATUS_PROCESS = 1;
    const STATUS_COMPLETE = 2;
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_NEW => Yii::t('app', 'LBL_NEW'),
            self::STATUS_COMPLETE => Yii::t('app', 'LBL_COMPLETE'),
        ];
    }

    const YN_NO = 0;
    const YN_YES = 1;
    public static function getYesNoArray()
    {
        return [
            self::YN_NO => Yii::t('app', 'LBL_NO'),
            self::YN_YES => Yii::t('app', 'LBL_YES'),
        ];
    }

    public function getSiteI18NName()
    {
        return ArrayHelper::getValue(self::getYesNoArray(), $this->site_i18n);
    }

    public function getPhotographyName()
    {
        return ArrayHelper::getValue(self::getYesNoArray(), $this->content_photography);
    }

    public function getMobileName()
    {
        return ArrayHelper::getValue(self::getYesNoArray(), $this->tech_mobile);
    }

    const LS_NO = 0;
    const LS_YES = 1;
    public static function getLsArray()
    {
        return [
            self::LS_YES => Yii::t('app', 'LBL_THE_COMPANY_HAS_A_LOGO'),
            self::LS_NO => Yii::t('app', 'LBL_THE_COMPANY_NEEDS_A_LOGO'),
        ];
    }

    public function getLogoStyleName()
    {
        return ArrayHelper::getValue(self::getLsArray(), $this->design_logo_style);
    }

    const RZ_NO = 0;
    const RZ_YES = 1;
    const RZ_RYES = 2;
    public static function getRzArray()
    {
        return [
            self::RZ_NO => Yii::t('app', 'LBL_THE_COMPANY_HAS_A_DESIGN'),
            self::RZ_YES => Yii::t('app', 'LBL_THE_COMPANY_NEEDS_A_DESIGN'),
            self::RZ_RYES => Yii::t('app', 'LBL_THE_COMPANY_NEEDS_A_REDESIGN'),
        ];
    }

    public function getStyleRedesignName()
    {
        return ArrayHelper::getValue(self::getRzArray(), $this->design_style_redesign);
    }

    const M_NO = 0;
    const M_YES = 1;
    public static function getMaterialsArray()
    {
        return [
            self::M_NO => Yii::t('app', 'LBL_THE_COMPANY_HAS_A_MATERIALS'),
            self::M_YES => Yii::t('app', 'LBL_THE_COMPANY_NEEDS_A_MATERIALS'),
        ];
    }

    public function getMaterialsName()
    {
        return ArrayHelper::getValue(self::getMaterialsArray(), $this->content_materials);
    }

    public function afterSave($insert, $changedAttributes)
    {
        //Send mail
        MailHelper::sendMail(Yii::$app->params['adminEmail'], Yii::$app->params['supportEmail'], "Новый бриф", "Новый бриф на сайте Палитры");

        parent::afterSave($insert, $changedAttributes);
    }

}
