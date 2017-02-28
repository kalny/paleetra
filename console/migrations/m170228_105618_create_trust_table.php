<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trust`.
 */
class m170228_105618_create_trust_table extends Migration
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

        $this->createTable('{{%trust}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(255),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%trust}}');
    }
}
