<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%departments}}`.
 */
class m221029_111122_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departments}}', [
            'department_id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_TEXT.' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%departments}}');
    }
}
