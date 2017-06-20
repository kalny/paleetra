<?php

use yii\db\Migration;

class m170620_055503_add_subject_column_into_task_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%task}}', 'subject', $this->string(255)->notNull());
    }

    public function down()
    {
        $this->dropColumn('{{%task}}', 'subject');
    }
}
