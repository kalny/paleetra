<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 13.11.2015
 * Time: 9:13
 */

namespace backend\models;

use yii\db\Query;
use Yii;
use yii\base\Model;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

abstract class RbacItemModel extends Model
{
    public $parent = null;
    public $name;
    public $description;
    public $rule_name;

    public $isNewRecord = true;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'uniqueItem'],
            [['description', 'rule_name', 'parent'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'parent' => Yii::t('app', 'LBL_PARENT'),
            'name' => Yii::t('app', 'LBL_NAME'),
            'description' => Yii::t('app', 'LBL_DESCRIPTION'),
            'rule_name' => Yii::t('app', 'LBL_RULE_NAME'),
        ];
    }

    abstract public function save();

    public static function find()
    {
        $rows = (new Query())
            ->select(['name', 'description', 'rule_name'])
            ->from('auth_item')
            ->where(['type' => static::TYPE])
            ->all();

        return $rows;
    }

    public static function findOne($name)
    {
        $item = new static;

        $row = (new Query())
            ->select(['name', 'description', 'rule_name'])
            ->from('auth_item')
            ->where(['name' => $name])
            ->one();

        $item->name = $row['name'];
        $item->description = $row['description'];
        $item->rule_name = $row['rule_name'];

        $row = (new Query())
            ->select(['parent', 'child'])
            ->from('auth_item_child')
            ->where(['child' => $item->name])
            ->one();

        if($row) {
            $item->parent = $row['parent'];
        }

        return $item;
    }

    public static function findParents($currentId = null)
    {
        $rows = (new Query())
            ->select(['name', 'description', 'rule_name'])
            ->from('auth_item')
            ->where(['type' => 1]);

        if ( ! is_null($currentId)) {
            $rows->andWhere(['!=','name',$currentId]);
        }

        return $rows->all();
    }

    public function uniqueItem($attribute, $params)
    {
        $auth = \Yii::$app->authManager;
        $permission = $auth->getPermission($this->name);

        if ($permission && $this->isNewRecord) {
            $this->addError($attribute, Yii::t('app', 'MSG_NAME_MUST_BE_UNIQUE'));
        }

    }
}