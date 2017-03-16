<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brif`.
 */
class m170316_075606_create_brif_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%brif}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0),

            'common_fullname' => $this->string(255)->notNull(),
            'common_domain' => $this->string(255)->defaultValue(null),
            'common_contact_fullname' => $this->string(255)->notNull(),
            'common_contact_details' => $this->text()->defaultValue(null),
            'common_terms' => $this->string(255)->notNull(),
            'common_notes' => $this->text()->defaultValue(null),

            'company_scope' => $this->text()->notNull(),
            'company_features' => $this->text()->notNull(),
            'company_competitors' => $this->text()->notNull(),
            'company_notes' => $this->text()->defaultValue(null),

            'target_audience' => $this->text()->notNull(),

            'problem_task' => $this->text()->notNull(),
            'problem_action' => $this->text()->notNull(),

            'site_parts' => $this->text()->defaultValue(null),
            'site_i18n' => $this->smallInteger(1)->notNull()->defaultValue(0),

            'design_logo_style' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'design_examples' => $this->text()->notNull(),
            'design_bad_examples' => $this->text()->notNull(),
            'design_effect' => $this->text()->notNull(),
            'design_style_redesign' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'design_notes' => $this->text()->defaultValue(null),

            'content_materials' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'content_author' => $this->string(255)->notNull(),
            'content_photography' => $this->smallInteger(1)->notNull()->defaultValue(0),
            'content_manager' => $this->string(255)->notNull(),

            'tech_cms' => $this->string(255)->defaultValue(null),
            'tech_soft' => $this->string(255)->defaultValue(null),
            'tech_pay' => $this->string(255)->defaultValue(null),
            'tech_mobile' => $this->smallInteger(1)->notNull()->defaultValue(0),

        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%brif}}');
    }
}
