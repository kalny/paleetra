<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m161122_062144_create_article_table extends Migration
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

        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'description' => $this->string(250)->defaultValue(null),
            'content' => $this->text()->notNull()
        ], $tableOptions);

        $this->createIndex('idx-article-name', '{{%article}}', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%article}}');
    }
}
