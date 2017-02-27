<?php

use yii\db\Migration;

class m170227_081209_add_pos_field_into_contact_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%contact}}', 'pos', $this->smallInteger());

        $contacts = \common\models\Contact::find()->all();

        $pos = 1;
        foreach ($contacts as $contact) {
            $contact->pos = $pos;
            $contact->save();

            $pos++;
        }
    }

    public function down()
    {
        $this->dropColumn('{{%contact}}', 'pos');
    }
}
