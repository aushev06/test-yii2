<?php

namespace app\modules\v1\controllers;

use app\models\Products;
use app\services\OrderServiceInterface;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\web\NotFoundHttpException;

class ProductController extends ActiveController
{
    public $modelClass = Products::class;

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        'metaEnvelope' => 'meta'
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors[] = [
            'class' => 'yii\filters\HttpCache',
            'only' => ['index'],
            'lastModified' => function ($action, $params) {
                $q = new \yii\db\Query();
                return strtotime($q->from('products')->max('updated_at'));
            },
        ];

        return $behaviors;
    }


    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        unset($actions['view'], $actions['create'], $actions['update'], $actions['delete'],);

        return $actions;
    }

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function actionBuy($slug, OrderServiceInterface $service)
    {
        $product = Products::find()->slug($slug)->one();
        if (!$product) {
            throw new NotFoundHttpException('Не удалось найти продукт!');
        }

        return $service->buy($product, \Yii::$app->user->identity);
    }
}
