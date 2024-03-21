<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m240321_205352_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'order_status_id' => $this->integer()->null(),
            'quantity' => $this->integer(),
            'price' => $this->decimal(19, 4),
            'created_at' => $this->dateTime(),
        ], 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB');

        $this->addForeignKey(
            'fk-product_id-orders',
            'orders',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_id-orders',
            'orders',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-order_status_id-orders',
            'orders',
            'order_status_id',
            'order_statuses',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
