<?php

use yii\db\Migration;

/**
 * Class m221119_090608_alter_timestart_from_workdays
 */
class m221119_090608_alter_timestart_from_workdays extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('workdays', 'time_start', \yii\db\Schema::TYPE_TIME);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221119_090608_alter_timestart_from_workdays cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221119_090608_alter_timestart_from_workdays cannot be reverted.\n";

        return false;
    }
    */
}
