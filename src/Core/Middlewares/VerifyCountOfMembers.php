<?php

namespace Hokage\Santa\Core\Middlewares;

use Hokage\Santa\Core\Interfaces\IMiddleware;
use Hokage\Santa\Core\Request;
use Hokage\Santa\Core\Response;

final class VerifyCountOfMembers implements IMiddleware
{
    public function handle(Request $request, callable $next): Response
    {
        $members = explode(',', $request->members);
        if (count($members) % 2 !== 0) {
            return new Response(Response::HTTP_BAD, [
                'errors' => '400',
                'message' => 'Число человек не четное, кому-то не достанется подарка...('
            ]);
        }

        return $next($request);
    }
}