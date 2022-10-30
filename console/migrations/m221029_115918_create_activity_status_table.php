<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activity_status}}`.
 */
class m221029_115918_create_activity_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity_status}}', [
            'status_id' => $this->primaryKey(),
            'name' => \yii\db\Schema::TYPE_STRING
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activity_status}}');
    }
}
