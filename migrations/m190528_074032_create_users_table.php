<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190528_074032_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'login' => $this->string(),
            'password' => $this->string(),
            'create' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
