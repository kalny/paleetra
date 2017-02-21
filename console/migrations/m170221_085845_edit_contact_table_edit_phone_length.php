<?php

use yii\db\Migration;

class m170221_085845_edit_contact_table_edit_phone_length extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%contact}}', 'phone', $this->string(20));
    }

    public function down()
    {
        $this->alterColumn('{{%contact}}', 'phone', $this->string(15));
    }
}
