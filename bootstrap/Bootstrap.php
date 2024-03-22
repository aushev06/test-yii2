<?php

namespace app\bootstrap;

use app\services\OrderService;
use app\services\OrderServiceInterface;
use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        Yii::$app->set(OrderServiceInterface::class, new OrderService());
    }
}
