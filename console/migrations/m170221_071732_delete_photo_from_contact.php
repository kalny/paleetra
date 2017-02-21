<?php

use yii\db\Migration;

class m170221_071732_delete_photo_from_contact extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%contact}}', 'photo');
    }

    public function down()
    {
        $this->addColumn('{{%contact}}', 'photo', $this->string(20)->notNull());
    }
}
