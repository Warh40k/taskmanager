<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `{{%activities}}`.
 */
class m221029_112919_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activities}}', [
            'activity_id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'expected_length' => Schema::TYPE_FLOAT,
            'date_create' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'date_start' => Schema::TYPE_DATETIME,
            'date_end' => Schema::TYPE_DATETIME,
            'description'  => Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activities}}');
    }
}
