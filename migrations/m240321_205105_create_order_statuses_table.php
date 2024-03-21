<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_statuses}}`.
 */
class m240321_205105_create_order_statuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_statuses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
        ]);

        $statuses = [
            ['name' => 'Завершен', 'slug' => 'completed'],
            ['name' => 'Отменен', 'slug' => 'canceled'],
        ];

        $this->batchInsert('order_statuses', ['name', 'slug'], $statuses);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_statuses}}');
    }
}
