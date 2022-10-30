<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%status_journal}}`.
 */
class m221029_120020_create_status_journal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%status_journal}}', [
            'id' => $this->primaryKey(),
            'activity_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status_id'  => Schema::TYPE_INTEGER . ' NOT NULL',
            'action' => Schema::TYPE_STRING,
            'message' => Schema::TYPE_TEXT,
            'date' => Schema::TYPE_DATETIME . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status_journal}}');
    }
}
