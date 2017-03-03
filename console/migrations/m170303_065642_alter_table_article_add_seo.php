<?php

use yii\db\Migration;

class m170303_065642_alter_table_article_add_seo extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'seo_description', $this->string()->defaultValue(null));
        $this->addColumn('{{%article}}', 'seo_keywods', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%article}}', 'seo_description');
        $this->dropColumn('{{%article}}', 'seo_keywods');
    }
}
