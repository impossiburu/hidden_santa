<?php

namespace Hokage\Santa\Core\Middlewares;

use Hokage\Santa\Core\Interfaces\IMiddleware;
use Hokage\Santa\Core\Request;
use Hokage\Santa\Core\Response;

final class SanitizePost implements IMiddleware
{
    public function handle(Request $request, callable $next): Response
    {
        if (!is_string($request->members)) {
            return new Response(Response::HTTP_BAD, [
                'errors' => '400',
                'message' => 'Неверные данные'
            ]);
        }

        if (empty($request->members)) {
            return new Response(Response::HTTP_BAD, []);
        }
        
        return $next($request);
    }
}