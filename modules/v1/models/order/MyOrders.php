<?php

namespace app\modules\v1\models\order;

use app\models\Orders;

class MyOrders extends Orders
{
    public static function find()
    {
        return parent::find()->where(['user_id' => \Yii::$app->user->identity->id]);
    }
}
