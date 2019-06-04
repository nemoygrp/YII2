<?php

use yii\db\Migration;

/**
 * Class m190604_092811_add_date_create_and_update_to_task_table
 */
class m190604_092811_add_date_create_and_update_to_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tasks','create_time',$this->date());
        $this->addColumn('tasks','update_time',$this->date());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tasks','create_time');
        $this->dropColumn('tasks','update_time');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190604_092811_add_date_create_and_update_to_task_table cannot be reverted.\n";

        return false;
    }
    */
}
