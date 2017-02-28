<?php

use yii\db\Migration;

class m170228_093211_add_image_field_into_motivation_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%motivation}}', 'image', $this->string(255));
    }

    public function down()
    {
        $this->dropColumn('{{%motivation}}', 'image');
    }
}
