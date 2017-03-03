<?php

use yii\db\Migration;

class m170303_062550_alter_table_article_add_slug extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'slug', $this->string(255)->notNull());
    }

    public function down()
    {
        $this->dropColumn('{{%article}}', 'slug');
    }
}
