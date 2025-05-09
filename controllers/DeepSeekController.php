<?php

namespace app\controllers;

use app\models\request\ChatRequest;
use app\models\response\ChatResponse;
use app\service\DeepSeekChatService;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;
use Yii;

class DeepSeekController extends BaseController
{
    private DeepSeekChatService $deepSeekChatService;

    /**
     * @throws BadRequestHttpException
     * @throws InvalidConfigException
     */
    public function actionChat(): ?ChatResponse
    {
        $this->deepSeekChatService = new DeepSeekChatService();
        $chatRequest = new ChatRequest();
        if ($chatRequest->load(["ChatRequest" => Yii::$app->request->post()]) && $chatRequest->validate()) {
            $chatResponse = $this->deepSeekChatService->chat($chatRequest);
            if (is_null($chatResponse)) {
                throw new BadRequestHttpException();
            } else {
                return $chatResponse;
            }
        }
        throw new BadRequestHttpException();
    }
}
