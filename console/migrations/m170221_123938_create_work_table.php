<?php

use yii\db\Migration;

/**
 * Handles the creation of table `work`.
 */
class m170221_123938_create_work_table extends Migration
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

        $this->createTable('{{%work}}', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull()->unique(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'sources' => $this->string(255)->defaultValue(null),
            'demo' => $this->string(255)->defaultValue(null),
            'category_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('idx-work-category_id', '{{%work}}', 'category_id');

        $this->addForeignKey('fk-work-category', '{{%work}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%work}}');
    }
}
