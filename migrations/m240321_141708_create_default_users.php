<?php

use yii\db\Migration;

/**
 * Class m240321_141708_create_default_users
 */
class m240321_141708_create_default_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('users', [
            'login' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
        ]);

        $this->insert('users', [
            'login' => 'user',
            'password_hash' => Yii::$app->security->generatePasswordHash('password'),
        ]);

        $adminId = $this->db->createCommand('SELECT id FROM users WHERE login = :login', [':login' => 'admin'])->queryScalar();

        $auth = Yii::$app->authManager;
        $permissions = [
            'createOrder' => 'Создание заказа',
            'updateOrder' => 'Редактирование заказа',
            'deleteOrder' => 'Удаление заказа',
            'orders' => 'Просмотр заказа',

            // Товары
            'createProduct' => 'Создание товара',
            'updateProduct' => 'Редактирование товара',
            'deleteProduct' => 'Удаление товара',
            'products' => 'Просмотр товаров',
        ];

        $role = $auth->createRole('admin');
        $auth->add($role);
        foreach ($permissions as $permission => $description) {
            $createdPermission = $auth->createPermission($permission);
            $createdPermission->description = $description;
            $auth->add($createdPermission);
            $auth->addChild($role, $createdPermission);
        }

        $auth->assign($role, $adminId);

        return true;

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('users', '1 = 1');

        return true;
    }

}
