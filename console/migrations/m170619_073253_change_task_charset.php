<?php

use yii\db\Migration;

class m170619_073253_change_task_charset extends Migration
{
    public function up()
    {
        $this->dropForeignKey('fk-state-task', '{{%state}}');

        $this->dropTable('{{%task}}');

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'rate' => $this->integer()->notNull()->defaultValue(1),
            'content' => $this->text()->notNull(),
        ], 'DEFAULT CHARSET=utf8');

        $this->addForeignKey('fk-state-task', '{{%state}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-state-task', '{{%state}}');

        $this->dropTable('{{%task}}');

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'rate' => $this->integer()->notNull()->defaultValue(1),
            'content' => $this->text()->notNull(),
        ], 'DEFAULT CHARSET=latin1');

        $this->addForeignKey('fk-state-task', '{{%state}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }
}
