<?php

namespace app\modules\v1\controllers\admin;

use app\models\Orders;
use app\models\Products;
use app\modules\v1\controllers\ActiveController;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;

class OrderController extends ActiveController
{
    public $modelClass = Orders::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }

    public function behaviors()
    {
        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['index', 'view', 'update',],
                    'roles' => ['admin'],
                ],
            ],
        ];

        return $behaviors;
    }
}
