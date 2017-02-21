<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contact`.
 */
class m170221_064918_create_contact_table extends Migration
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

        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'position' => $this->string(150)->notNull(),
            'phone' => $this->string(15)->notNull(),
            'email' => $this->string(150)->notNull(),
            'photo' => $this->string(20)->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%contact}}');
    }
}
