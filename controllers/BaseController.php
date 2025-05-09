<?php

namespace app\controllers;

use app\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
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

        return ArrayHelper::merge([
            [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS', 'LICENSE'],
                ],
                'actions' => [
                    'login' => [
                        'Access-Control-Allow-Credentials' => true,
                    ]
                ]
            ],
        ], $behaviors);
    }
}