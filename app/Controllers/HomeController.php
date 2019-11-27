<?php

namespace App\Controllers;

use Respect\Validation\Validator as v;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\StatusCode;

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
        logger()->info(__METHOD__, $request->getParams());

        $validator =  $this->validator->validate($request, [
            'name' => v::optional(v::stringType()->alpha()),
        ]);

        if (!$validator->isValid()) {
            return $response->withJson([
                'message' => 'The given data was invalid.',
                'errors' => $validator->getErrors(),
            ], StatusCode::HTTP_UNPROCESSABLE_ENTITY);
        }

        return view('index.twig', [
            'name' => $request->getParam('name', 'World')
        ]);
    }
}