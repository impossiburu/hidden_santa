<?php

namespace Hokage\Santa\Services;

use Hokage\Santa\Core\Interfaces\IHandler;
use Hokage\Santa\Core\Request;
use Hokage\Santa\Core\Response;

final class Santa implements IHandler
{
    private array $pairs;

    public function handle(Request $request): Response
    {
        $members = explode(',', $request->members);
	    shuffle($members);
	
        foreach ($members as $key => $member) {
            $this->pairs[$member] = $members[$key + 1] ?? $members[0];
        }

        return new Response(Response::HTTP_OK, $this->pairs);
    }
}