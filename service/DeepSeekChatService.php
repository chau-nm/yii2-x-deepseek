<?php

namespace app\service;

use app\http\DeepSeekClient;
use app\models\request\ChatRequest;
use app\models\response\ChatResponse;
use yii\base\InvalidConfigException;
use yii\web\BadRequestHttpException;

class DeepSeekChatService
{
    const string CHAT_URL = '/chat/completions';
    const string CHAT_METHOD = 'POST';

    /**
     * @throws InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function chat(ChatRequest $chatRequest): ?ChatResponse
    {
        $data = [
            'model' => 'deepseek-chat',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $chatRequest->message,
                ]
            ]
        ];
        /**
         * @var DeepSeekClient $deepSeekClient
         */
        $deepSeekClient = \Yii::$app->get('deepSeekerClient');
        $response = $deepSeekClient->execute(self::CHAT_METHOD, self::CHAT_URL, [], json_encode($data));
        if ($response->getStatusCode() !== 200) {
            throw new BadRequestHttpException();
        }
        $content = json_decode($response->getBody()->getContents());
        $message = $content->choices[0]->message->content;
        $chatResponse = new ChatResponse();
        if ($chatResponse->load(['ChatResponse' => ['reply' => $message]]) && $chatResponse->validate()) {
            return $chatResponse;
        }
        return null;
    }
}