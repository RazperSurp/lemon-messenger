<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_chat}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%chat}}`
 */
class m221128_131336_create_user_chat_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_chat}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'chat_id' => $this->integer()->notNull(),
            'admin' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_chat-user_id}}',
            '{{%user_chat}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_chat-user_id}}',
            '{{%user_chat}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `chat_id`
        $this->createIndex(
            '{{%idx-user_chat-chat_id}}',
            '{{%user_chat}}',
            'chat_id'
        );

        // add foreign key for table `{{%chat}}`
        $this->addForeignKey(
            '{{%fk-user_chat-chat_id}}',
            '{{%user_chat}}',
            'chat_id',
            '{{%chat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_chat-user_id}}',
            '{{%user_chat}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_chat-user_id}}',
            '{{%user_chat}}'
        );

        // drops foreign key for table `{{%chat}}`
        $this->dropForeignKey(
            '{{%fk-user_chat-chat_id}}',
            '{{%user_chat}}'
        );

        // drops index for column `chat_id`
        $this->dropIndex(
            '{{%idx-user_chat-chat_id}}',
            '{{%user_chat}}'
        );

        $this->dropTable('{{%user_chat}}');
    }
}
