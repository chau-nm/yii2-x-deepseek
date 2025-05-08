<?php

namespace app\controllers;

use app\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller;

class BaseController extends Controller
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth'  => function ($username, $password) {
                $user = new User($username, $password);
                return $user->validate() ? $user : null;
            }
        ];

        return $behaviors;
    }
}