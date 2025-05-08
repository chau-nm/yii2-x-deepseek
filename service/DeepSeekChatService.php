<?php

namespace app\service;

use app\http\DeepSeekClient;
use app\models\request\ChatRequest;
use app\service\factory\ChatBodyFactory;

class DeepSeekChatService
{
    const string CHAT_URL = '/chat/completions';
    const string CHAT_METHOD = 'POST';

    public function chat(ChatRequest $chatRequest): array
    {
        $data = ChatBodyFactory::create($chatRequest->message);
        /**
         * @var DeepSeekClient $deepSeekClient
         */
        $deepSeekClient = \Yii::$app->get('deepSeekerClient');
        return $deepSeekClient->execute(self::CHAT_METHOD, self::CHAT_URL, [], json_encode($data));
    }
}