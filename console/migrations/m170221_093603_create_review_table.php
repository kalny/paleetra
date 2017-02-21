<?php

use yii\db\Migration;

/**
 * Handles the creation of table `review`.
 */
class m170221_093603_create_review_table extends Migration
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

        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'position' => $this->string(150)->notNull(),
            'photo' => $this->string(20)->notNull(),
            'body' => $this->text()->notNull()
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%review}}');
    }
}
