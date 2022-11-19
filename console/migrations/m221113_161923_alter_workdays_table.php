<?php

use yii\db\Migration;

/**
 * Class m221113_161923_alter_workdays_table
 */
class m221113_161923_alter_workdays_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('workdays', 'time_start', \yii\db\Schema::TYPE_FLOAT);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221113_161923_alter_workdays_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221113_161923_alter_workdays_table cannot be reverted.\n";

        return false;
    }
    */
}
