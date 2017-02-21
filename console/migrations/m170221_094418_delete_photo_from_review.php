<?php

use yii\db\Migration;

class m170221_094418_delete_photo_from_review extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%review}}', 'photo');
    }

    public function down()
    {
        $this->addColumn('{{%review}}', 'photo', $this->string(20)->notNull());
    }
}
