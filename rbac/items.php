<?php

return [
    'createOrder' => [
        'type' => 2,
        'description' => 'Создание заказа',
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'createOrder',
            'updateOrder',
            'deleteOrder',
            'orders',
            'createProduct',
            'updateProduct',
            'deleteProduct',
            'products',
        ],
    ],
    'updateOrder' => [
        'type' => 2,
        'description' => 'Редактирование заказа',
    ],
    'deleteOrder' => [
        'type' => 2,
        'description' => 'Удаление заказа',
    ],
    'orders' => [
        'type' => 2,
        'description' => 'Просмотр заказа',
    ],
    'createProduct' => [
        'type' => 2,
        'description' => 'Создание товара',
    ],
    'updateProduct' => [
        'type' => 2,
        'description' => 'Редактирование товара',
    ],
    'deleteProduct' => [
        'type' => 2,
        'description' => 'Удаление товара',
    ],
    'products' => [
        'type' => 2,
        'description' => 'Просмотр товаров',
    ],
];
