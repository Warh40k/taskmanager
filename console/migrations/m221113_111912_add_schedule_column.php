<?php

use yii\db\Migration;

/**
 * Class m221113_111912_add_schedule_column
 */
class m221113_111912_add_schedule_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('schedules', 'calendar_path', \yii\db\Schema::TYPE_STRING);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('schedules', 'calendar_path');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221113_111912_add_schedule_column cannot be reverted.\n";

        return false;
    }
    */
}
