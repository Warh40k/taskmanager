<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%schedules}}`.
 */
class m221029_112128_create_schedules_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedules}}', [
            'schedule_id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedules}}');
    }
}
