<?php

use yii\db\Migration;

/**
 * Handles the creation of table `step`.
 */
class m170228_120749_create_step_table extends Migration
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

        $this->createTable('{{%step}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%step}}');
    }
}
