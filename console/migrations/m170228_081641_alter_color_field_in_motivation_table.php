<?php

use yii\db\Migration;

class m170228_081641_alter_color_field_in_motivation_table extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%motivation}}', 'color', $this->string(8));
    }

    public function down()
    {
        $this->alterColumn('{{%motivation}}', 'color', $this->string(6));
    }
}
