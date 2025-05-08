<?php

namespace app\controllers;

use app\models\request\ChatRequest;
use app\service\DeepSeekChatService;
use yii\web\BadRequestHttpException;
use Yii;

class DeepSeekController extends BaseController
{
    public DeepSeekChatService $deepSeekChatService;

    /**
     * @throws BadRequestHttpException
     */
    public function actionChat(): ?array
    {
        $this->deepSeekChatService = new DeepSeekChatService();
        $chatRequest = new ChatRequest();
        if ($chatRequest->load(["ChatRequest" => Yii::$app->request->post()]) && $chatRequest->validate()) {
            return $this->deepSeekChatService->chat($chatRequest);
        }
        return [Yii::$app->request->post()];
    }
}