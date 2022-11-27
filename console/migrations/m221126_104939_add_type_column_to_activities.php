<?php

use yii\db\Migration;

/**
 * Class m221126_104939_add_type_column_to_activities
 */
class m221126_104939_add_type_column_to_activities extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activities', 'type', \yii\db\Schema::TYPE_INTEGER);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activities', 'type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221126_104939_add_type_column_to_activities cannot be reverted.\n";

        return false;
    }
    */
}
