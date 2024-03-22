<?php

namespace app\modules\v1\controllers;

use app\models\Orders;
use app\modules\v1\models\order\MyOrders;
use yii\filters\auth\HttpBearerAuth;

class OrderController extends ActiveController
{
    public $modelClass = MyOrders::class;

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        'metaEnvelope' => 'meta'
    ];


    public function actions()
    {
        $actions = parent::actions();

        unset($actions['show'], $actions['create'], $actions['update'], $actions['delete']);

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }


}
