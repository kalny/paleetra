<?php

use yii\db\Migration;

class m170227_084806_add_link_field_into_work_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%work}}', 'link', $this->string(255)->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%work}}', 'link');
    }
}
