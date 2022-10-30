<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%positions}}`.
 */
class m221029_111640_create_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%positions}}', [
            'position_id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING,
            'salary' => Schema::TYPE_DECIMAL
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%positions}}');
    }
}
