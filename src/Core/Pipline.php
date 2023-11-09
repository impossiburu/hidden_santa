<?php

namespace Hokage\Santa\Core;

use Hokage\Santa\Core\Interfaces\IHandler;

final class Pipline
{
    public function __construct(
        private readonly IHandler $handler,
        private array $middlewares
    )
    {}

    public function handle(Request $request): Response
    {
        $middleware = array_shift($this->middlewares);

        if ($middleware !== null) {
            return $middleware->handle($request, [$this, 'handle']);
        }

        return $this->handler->handle($request);
    }
}