<?php

namespace app\models\request;

use yii\base\Model;

class ChatRequest extends Model
{
    public ?string $message = null;

    public function rules(): array
    {
        return [
            ['message', 'required'],
        ];
    }
}