<?php

namespace Hokage\Santa\Core;

final class Request
{
    public function __construct(
        public readonly string $members
    )
    {}
}