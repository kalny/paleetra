<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 13.11.2015
 * Time: 9:28
 */

namespace backend\models;

use yii\db\Query;


class Role extends RbacItemModel
{
    const TYPE = 1;

    public function save()
    {
        $auth = \Yii::$app->authManager;

        $role = $auth->createRole($this->name);

        if (!empty($this->rule_name)) {
            $role->ruleName = $this->rule_name;
        }

        try {
            $auth->add($role);

            if (!is_null($this->parent)) {
                $parent = $auth->getRole($this->parent);
                $auth->addChild($parent, $role);
            }
        } catch (\Exception $e) {
            $this->addError($e->getMessage());
        }

    }

    public static function permissions($name)
    {
        $rows = (new Query())
            ->select(['child'])
            ->from('auth_item_child')
            ->where(['parent' => $name])
            ->all();

        return $rows;
    }
}