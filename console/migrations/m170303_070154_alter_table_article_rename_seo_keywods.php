<?php

use yii\db\Migration;

class m170303_070154_alter_table_article_rename_seo_keywods extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%article}}', 'seo_keywods');
        $this->addColumn('{{%article}}', 'seo_keywords', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%article}}', 'seo_keywords');
        $this->addColumn('{{%article}}', 'seo_keywods', $this->string()->defaultValue(null));
    }
}
