<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%read_message}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%message}}`
 * - `{{%user}}`
 */
class m221128_131430_create_read_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%read_message}}', [
            'id' => $this->primaryKey(),
            'message_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `message_id`
        $this->createIndex(
            '{{%idx-read_message-message_id}}',
            '{{%read_message}}',
            'message_id'
        );

        // add foreign key for table `{{%message}}`
        $this->addForeignKey(
            '{{%fk-read_message-message_id}}',
            '{{%read_message}}',
            'message_id',
            '{{%message}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-read_message-user_id}}',
            '{{%read_message}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-read_message-user_id}}',
            '{{%read_message}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%message}}`
        $this->dropForeignKey(
            '{{%fk-read_message-message_id}}',
            '{{%read_message}}'
        );

        // drops index for column `message_id`
        $this->dropIndex(
            '{{%idx-read_message-message_id}}',
            '{{%read_message}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-read_message-user_id}}',
            '{{%read_message}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-read_message-user_id}}',
            '{{%read_message}}'
        );

        $this->dropTable('{{%read_message}}');
    }
}
