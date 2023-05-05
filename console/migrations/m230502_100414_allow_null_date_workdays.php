<?php

use yii\db\Migration;

/**
 * Class m230502_100414_allow_null_date_workdays
 */
class m230502_100414_allow_null_date_workdays extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('workdays', 'date', \yii\db\Schema::TYPE_DATE);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230502_100414_allow_null_date_workdays cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_100414_allow_null_date_workdays cannot be reverted.\n";

        return false;
    }
    */
}
