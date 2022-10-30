<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actions}}`.
 */
class m221029_120737_create_actions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actions}}', [
            'action_id' => $this->primaryKey(),
            'name' => \yii\db\Schema::TYPE_STRING .' NOT NULL',
            'message' => \yii\db\Schema::TYPE_STRING . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actions}}');
    }
}
