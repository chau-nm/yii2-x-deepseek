<?php

namespace app\service\factory;

class ChatBodyFactory
{
    public static function create(string $message): array
    {
        return [
            'model' => 'deepseek-chat',
            'message' => [
                [
                    'role' => 'user',
                    'content' => $message,
                ]
            ]
        ];
    }
}