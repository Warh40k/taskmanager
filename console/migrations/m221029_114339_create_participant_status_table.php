<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%participant_status}}`.
 */
class m221029_114339_create_participant_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%participant_status}}', [
            'status_id' => $this->primaryKey(),
            'name' => \yii\db\Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%participant_status}}');
    }
}
