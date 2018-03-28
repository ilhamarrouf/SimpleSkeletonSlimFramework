<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        $this->logger->info('Homepage action');

        return $this->view->render($response, 'index.twig');
    }
}