<?php

namespace app\services;

use app\models\Orders;
use app\models\OrdersStatuses;
use app\models\Products;
use app\models\User;
use yii\mutex\FileMutex;
use yii\web\BadRequestHttpException;

class OrderService implements OrderServiceInterface
{

    public function buy(Products $product, User $user): Orders
    {
        $mutex = new FileMutex();
        // блокировка именно по продукту
        $lock = $mutex->acquire('order_' . $product->id);

        if ($lock) {
            $status = OrdersStatuses::find()->completed()->one();

            $order = new Orders();
            $order->product_id = $product->id;
            $order->user_id = $user->id;
            $order->order_status_id = $status->id;
            $order->quantity = 1;
            $order->created_at = date('Y-m-d H:i:s');

            if (!$order->save()) {
                $mutex->release('order_' . $product->id);
                throw new BadRequestHttpException('Не удалось создать заказ: ' . implode(',', $order->getFirstErrors()));
            }
            $mutex->release('order_' . $product->id);
            return $order;
        }
        throw new BadRequestHttpException('Данный продукт нельзя заказать сейчас!');

    }
}
