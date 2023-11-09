<?php

namespace Hokage\Santa\Core\Interfaces;

use Hokage\Santa\Core\Request;
use Hokage\Santa\Core\Response;

interface IMiddleware
{
    public function handle(Request $request, callable $next): Response;
}