<?php

use yii\db\Migration;
use backend\models\User;

class m161123_061658_add_admin_user extends Migration
{
    
    public function safeUp()
    {
        $time = time();
        $userId = 1;
        $password = '11111111';
        
        /*Add user*/
        $this->insert('{{%user}}', [
            'id' => $userId,
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash($password),
            'email' => 'admin@example.com',
            'status' => User::STATUS_ACTIVE,
            'created_at' => $time,
            'updated_at' => $time,
        ]);
        
        /*Add rbac items*/
        $this->batchInsert('{{%auth_item}}', [
            'name', 'type', 'description', 'rule_name', 'data', 'created_at', 'updated_at'
        ], [
            ['admin', 1, null, null, null, $time, $time],
            ['manageArticles', 2, 'Management of articles', null, null, $time, $time],
            ['manageMenu', 2, 'Management of menu', null, null, $time, $time],
            ['managePermissions', 2, 'Management of user privileges', null, null, $time, $time],
            ['manager', 1, null, null, null, $time, $time],
            ['manageUsers', 2, 'Management of users', null, null, $time, $time],
            ['user', 1, null, null, null, $time, $time],
            ['watchDashboard', 2, 'Watching Dashboard', null, null, $time, $time]
        ]);

        $this->batchInsert('{{%auth_item_child}}', [
            'parent', 'child'
        ], [
            ['manager', 'manageArticles'],
            ['manager', 'manageMenu'],
            ['admin', 'managePermissions'],
            ['admin', 'manager'],
            ['admin', 'manageUsers'],
            ['manager', 'user'],
            ['admin', 'watchDashboard']
        ]);

        /*Add rbac assignments*/
        $this->insert('{{%auth_assignment}}', [
            'item_name' => 'admin',
            'user_id' => $userId,
            'created_at' => $time,
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%auth_assignment}}');
        $this->delete('{{%auth_item_child}}');
        $this->delete('{{%user}}');
    }
    
}
