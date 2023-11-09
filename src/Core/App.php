<?php

namespace Hokage\Santa\Core;

use Hokage\Santa\Core\Interfaces\IHandler;

final class App
{
    public function __construct(
        private readonly IHandler $handler,
        private readonly array $middlewares,
    )
    {}

    public function run(Request $request): Response
    {
        return (new Pipline($this->handler, $this->middlewares))->handle($request);
    }
}