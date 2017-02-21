<?php

use yii\db\Migration;

/**
 * Handles the creation of table `call`.
 */
class m170221_114405_create_call_table extends Migration
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

        $this->createTable('{{%call}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'phone' => $this->string(20)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%call}}');
    }
}
