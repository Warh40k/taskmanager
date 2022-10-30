<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%employee_activity}}`.
 */
class m221029_112453_create_employee_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee-activity}}', [
            'id' => $this->primaryKey(),
            'activity_id' => Schema::TYPE_INTEGER,
            'employee_id' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_INTEGER
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee-activity}}');
    }
}
