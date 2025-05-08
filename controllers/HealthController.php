<?php

namespace app\controllers;

use yii\web\Controller;

class HealthController extends Controller
{
    public function actionIndex(): string
    {
        return "OK";
    }
}