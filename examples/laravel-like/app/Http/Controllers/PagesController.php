<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PagesController
{
    public function home(Request $request, Response $response)
    {
        return $response->getBody()->write("Hello World! ;)");
    }
}