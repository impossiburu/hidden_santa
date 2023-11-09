<?php

namespace Hokage\Santa\Core\Interfaces;

use Hokage\Santa\Core\Request;
use Hokage\Santa\Core\Response;

interface IHandler
{
    public function handle(Request $request): Response;
}