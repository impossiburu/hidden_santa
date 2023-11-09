<?php

namespace Hokage\Santa\Core;

final class Response
{
    public const HTTP_OK = 'OK';
    public const HTTP_BAD = 'BAD REQUEST';

    public function __construct(
        private readonly string $status,
        public readonly array $data
    )
    {
        
    }
}