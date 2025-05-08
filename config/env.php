<?php

$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load();

/**
 * Get ENV
 *
 * @param string $key
 * @return string|null
 */
function env(string $key): ?string
{
    return $_ENV[$key] ?? $_SERVER[$key] ?? null;
}