<?php

use yii\db\Migration;

/**
 * Class m221104_091301_update_user_table
 */
class m221104_091301_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','employee',\yii\db\Schema::TYPE_INTEGER .' NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'employee');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221104_091301_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
