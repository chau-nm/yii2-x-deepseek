<?php

namespace app\models\response;

use yii\base\Model;

class ChatResponse extends Model
{
    public string $reply;

    public function rules(): array
    {
        return [
            ['reply', 'required'],
        ];
    }
}