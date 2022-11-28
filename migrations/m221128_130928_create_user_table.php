<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m221128_130928_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(20)->notNull()->unique(),
            'password' => $this->text()->notNull(),
            'lastname' => $this->string(20)->notNull(),
            'firstname' => $this->string(20)->notNull(),
            'middlename' => $this->string(20)->notNull(),
            'email' => $this->string(20)->notNull()->unique(),
            'phone' => $this->string(20)->notNull()->unique(),
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
        $this->dropTable('{{%user}}');
    }
}
