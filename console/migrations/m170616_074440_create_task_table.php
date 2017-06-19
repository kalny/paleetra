<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m170616_074440_create_task_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'rate' => $this->integer()->notNull()->defaultValue(1),
            'content' => $this->text()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%states}}', [
            'task_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx-states-task_id', '{{%states}}', ['task_id']);
        $this->createIndex('idx-states-company_id', '{{%states}}', ['company_id']);

        $this->addForeignKey('fk-states-task', '{{%states}}', 'task_id', '{{%task}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%states}}');
        $this->dropTable('{{%task}}');
    }
}
