<?php

use yii\db\Migration;

class m170303_102241_alter_table_article_add_field_short_anonce extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'short_anonce', $this->string()->notNull());
    }

    public function down()
    {
        $this->dropColumn('{{%article}}', 'short_anonce');
    }
}
