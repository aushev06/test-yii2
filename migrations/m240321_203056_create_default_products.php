<?php

use yii\db\Migration;

/**
 * Class m240321_203056_create_default_products
 */
class m240321_203056_create_default_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $productNames = [
            "Смартфон" => 'smartphone',
            "Ноутбук" => 'notebook',
            "Телевизор" => 'tv',
            "Планшет" => 'tablet',
            "Компьютерная мышь" => 'computer-mouse',
            "Наушники" => 'headphones',
            "Умные часы" => 'smart-watches',
            "Фотоаппарат" => 'photo',
            "Игровая консоль" => 'playstation',
            "Монитор" => 'monitor'
        ];

        $products = [];
        foreach ($productNames as $productName => $slug) {
            $price = mt_rand(100, 10000);
            $products[] = [
                'name' => $productName,
                'price' => $price,
                'slug' => $slug,
            ];
        }

        $this->batchInsert('products', ['name', 'price', 'slug'], $products);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240321_203056_create_default_products cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240321_203056_create_default_products cannot be reverted.\n";

        return false;
    }
    */
}
