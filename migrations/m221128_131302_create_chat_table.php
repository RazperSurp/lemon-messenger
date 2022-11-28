<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chat}}`.
 */
class m221128_131302_create_chat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chat}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'avatar_url' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chat}}');
    }
}
