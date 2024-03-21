<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m240321_112202_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'access_token' => $this->string()->null(),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
