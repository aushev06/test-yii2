<?php

namespace app\modules\v1\models\auth;

use app\models\User;
use yii\validators\RequiredValidator;
use yii\web\BadRequestHttpException;

class AuthForm extends \yii\base\Model
{
    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $password;


    public function formName()
    {
        return '';
    }

    public function rules()
    {
        return [
            [['login', 'password'], RequiredValidator::class],
            ['login', 'exist', 'targetClass' => User::class, 'targetAttribute' => ['login' => 'login']],

        ];
    }

    public function login()
    {
        $user = User::findByUsername($this->login);
        if ($user->validatePassword($this->password)) {
            $user->access_token = \Yii::$app->security->generateRandomString();
            $user->save();
            return $user;
        }

        throw new BadRequestHttpException('Пользователь не найден или неправильно введен пароль!');
    }
}
