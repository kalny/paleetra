<?php

use yii\db\Migration;

class m170616_083606_rename_states_table extends Migration
{
    public function up()
    {
        $this->dropForeignKey('fk-states-task', '{{%states}}');

        $this->dropIndex('idx-states-task_id', '{{%states}}');
        $this->dropIndex('idx-states-company_id', '{{%states}}');

        $this->renameTable('{{%states}}', '{{%state}}');

        $this->createIndex('idx-state-task_id', '{{%state}}', ['task_id']);
        $this->createIndex('idx-state-company_id', '{{%state}}', ['company_id']);

        $this->addForeignKey('fk-state-task', '{{%state}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-state-task', '{{%state}}');

        $this->dropIndex('idx-state-task_id', '{{%state}}');
        $this->dropIndex('idx-state-company_id', '{{%state}}');

        $this->renameTable('{{%state}}', '{{%states}}');

        $this->createIndex('idx-states-task_id', '{{%states}}', ['task_id']);
        $this->createIndex('idx-states-company_id', '{{%states}}', ['company_id']);

        $this->addForeignKey('fk-states-task', '{{%states}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }
}
