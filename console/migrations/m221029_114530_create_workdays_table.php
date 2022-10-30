<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%workdays}}`.
 */
class m221029_114530_create_workdays_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workdays}}', [
            'workday_id' => $this->primaryKey(),
            'schedule_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'date' => Schema::TYPE_DATE . ' NOT NULL',
            'time_start' => Schema::TYPE_DATETIME . ' NOT NULL',
            'work_length' => Schema::TYPE_FLOAT,
            'rest_length' => Schema::TYPE_FLOAT
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%workdays}}');
    }
}
