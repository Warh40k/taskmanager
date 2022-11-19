<?php

use yii\db\Migration;

/**
 * Class m221119_142325_delete_filepath_from_schedules
 */
class m221119_142325_delete_filepath_from_schedules extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('schedules', 'calendar_path');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221119_142325_delete_filepath_from_schedules cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221119_142325_delete_filepath_from_schedules cannot be reverted.\n";

        return false;
    }
    */
}
