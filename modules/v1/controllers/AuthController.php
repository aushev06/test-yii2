<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\auth\AuthForm;
use yii\rest\Controller;
use yii\web\ForbiddenHttpException;

class AuthController extends Controller
{
    public function actionIndex()
    {
        $form = new AuthForm();
        $form->load(\Yii::$app->request->getBodyParams());

        if (!$form->validate()) {
            return $form;
        }

        return $form->login();
    }
}
