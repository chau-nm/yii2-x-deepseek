<?php

namespace app\controllers;

class GreetingController extends BaseController
{
    public function actionIndex(): string
    {
        return "Hello World!";
    }
}