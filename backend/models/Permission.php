<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 13.11.2015
 * Time: 9:21
 */

namespace backend\models;

class Permission extends RbacItemModel
{
    const TYPE = 2;

    public function save()
    {
        $auth = \Yii::$app->authManager;

        $permission = $auth->createPermission($this->name);

        $permission->description = $this->description;
        if (!empty($this->rule_name)) {
            $permission->ruleName = $this->rule_name;
        }

        try {



            $auth->add($permission);



            if (!is_null($this->parent)) {
                $parent = $auth->getRole($this->parent);

                $auth->addChild($parent, $permission);
            }




        } catch (\Exception $e) {
            $this->addError($e->getMessage());
        }
    }
}