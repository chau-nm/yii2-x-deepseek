<?php

namespace app\http;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class DeepSeekClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('DEEP_SEEK_BASE_URL'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('DEEP_SEEK_ACCESS_TOKEN'),
            ]
        ]);
    }

    public function execute(string $method, string $url, array $headers = [], $body = null): array
    {
        $request = new Request($method, $url, $headers, $body);
        return $this->client->sendAsync($request)->wait();
    }
}