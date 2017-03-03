<?php

use yii\db\Migration;

class m170303_061911_alter_table_article_add_created_at extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'created_at', $this->integer()->notNull());
    }

    public function down()
    {
        $this->dropColumn('{{%article}}', 'created_at');
    }
}
