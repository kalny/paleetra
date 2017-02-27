<?php

use yii\db\Migration;

class m170227_070553_add_pos_field_into_work_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%work}}', 'pos', $this->smallInteger());

        $works = \common\models\Work::find()->all();

        $pos = 1;
        foreach ($works as $work) {
            $work->pos = $pos;
            $work->save();

            $pos++;
        }
    }

    public function down()
    {
        $this->dropColumn('{{%work}}', 'pos');
    }
}
