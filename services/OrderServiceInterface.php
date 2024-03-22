<?php

namespace app\services;

use app\models\Orders;
use app\models\Products;
use app\models\User;

interface OrderServiceInterface
{
    public function buy(Products $product, User $user): Orders;
}
