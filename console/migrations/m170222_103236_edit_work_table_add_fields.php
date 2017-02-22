<?php

use yii\db\Migration;

class m170222_103236_edit_work_table_add_fields extends Migration
{
    public function up()
    {
        $this->addColumn('{{%work}}', 'title_short', $this->string(100));
        $this->addColumn('{{%work}}', 'description_short', $this->string(100));
    }

    public function down()
    {
        $this->dropColumn('{{%work}}', 'title_short');
        $this->dropColumn('{{%work}}', 'description_short');
    }

}
