<?php

namespace app\models;

class User implements \yii\web\IdentityInterface
{

    public function __construct(
        public string $username,
        public string $password
    )
    {
    }

    public static function findIdentity($id): ?User
    {
        return $id === env('APP_USERNAME') ? new User(
            env('APP_USERNAME'),
            env('APP_PASSWORD'),
        ) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null): ?User
    {
        $tokenDecode = base64_decode($token);
        $tokenDecodeSplits = explode(':', $tokenDecode);
        if (count($tokenDecodeSplits) < 2) {
            return null;
        }

        $username = $tokenDecodeSplits[0];
        $password = $tokenDecodeSplits[1];

        return $username === env('APP_USERNAME')
            && $password === env('APP_PASSWORD')
            ? new User(
                env('APP_USERNAME'),
                env('APP_PASSWORD'),
            )
            : null;
    }

    public function getId(): string
    {
        return $this->username;
    }

    public function getAuthKey(): string
    {
        return base64_encode("{$this->username}:{$this->password}");
    }

    public function validateAuthKey($authKey): bool
    {
        return base64_encode("{$this->username}:{$this->password}") === $authKey;
    }

    public function validate(): bool
    {
        return $this->username === env('APP_USERNAME') && $this->password === env('APP_PASSWORD');
    }
}