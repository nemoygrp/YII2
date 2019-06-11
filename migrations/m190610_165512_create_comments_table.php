<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m190610_165512_create_comments_table extends Migration
{
    protected $tableName = 'comments';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'user_id' => $this->integer(),
            'content' => $this->string()->notNull(),
            'create_time' => $this->date(),
            'update_time' => $this->date(),

        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }
}
