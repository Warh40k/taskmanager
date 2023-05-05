<?php

use yii\db\Migration;

/**
 * Class m230502_095500_add_workdays_columns
 */
class m230502_095500_add_workdays_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('workdays', 'weekend', \yii\db\Schema::TYPE_BOOLEAN);
        $this->addColumn('workdays', 'default', \yii\db\Schema::TYPE_BOOLEAN);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230502_095500_add_workdays_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230502_095500_add_workdays_columns cannot be reverted.\n";

        return false;
    }
    */
}
