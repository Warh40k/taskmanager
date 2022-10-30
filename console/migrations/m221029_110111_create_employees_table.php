<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%employees}}`.
 */
class m221029_110111_create_employees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employees}}', [
            'employee_id' => $this->primaryKey(),
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'second_name' => Schema::TYPE_STRING . ' NOT NULL',
            'third_name' => Schema::TYPE_STRING . ' NOT NULL',
            'date_attempt' => Schema::TYPE_DATE,
            'position' => Schema::TYPE_INTEGER,
            'department' => Schema::TYPE_INTEGER,
            'schedule' => Schema::TYPE_INTEGER
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employees}}');
    }
}
