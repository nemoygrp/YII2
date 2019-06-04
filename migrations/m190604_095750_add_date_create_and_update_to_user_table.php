<?php

use yii\db\Migration;

/**
 * Class m190604_095750_add_date_create_and_update_to_user_table
 */
class m190604_095750_add_date_create_and_update_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','create_time',$this->date());
        $this->addColumn('users','update_time',$this->date());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users','create_time');
        $this->dropColumn('users','update_time');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190604_095750_add_date_create_and_update_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
