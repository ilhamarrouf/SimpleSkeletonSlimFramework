<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     *
     * @return Response
     */
    public function index(Request $request, Response $response, array $args) : Response
    {
        $this->logger->info(__METHOD__, $request->getParams());

        return $this->view->render($response, 'index.twig', [
            'name' => $request->getParam('name', 'World')
        ]);
    }
}