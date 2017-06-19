<?php

use yii\db\Migration;

class m170619_073253_change_task_charset extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

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
        ], $tableOptions);

        $this->addForeignKey('fk-state-task', '{{%state}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

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
        ], $tableOptions);

        $this->addForeignKey('fk-state-task', '{{%state}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }
}
