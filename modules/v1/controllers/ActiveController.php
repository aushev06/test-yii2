<?php

namespace app\modules\v1\controllers;

use yii\filters\auth\HttpBearerAuth;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        if (!\Yii::$app->request->isOptions) {
            $behaviors['authenticator'] = [
                'class' => HttpBearerAuth::class,
            ];
        }

        return $behaviors;
    }
}
