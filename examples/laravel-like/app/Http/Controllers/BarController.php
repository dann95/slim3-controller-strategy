<?php


namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BarController
{
    public function foo(Request $request, Response $response)
    {
        return $response->getBody()->write("Foo Bar Baz XD");
    }
}