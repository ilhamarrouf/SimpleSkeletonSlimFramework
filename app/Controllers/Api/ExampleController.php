<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/03/19
 * Time: 01.53
 */

namespace App\Controllers\Api;

use League\Fractal\Resource\Collection;
use Slim\Http\Request;
use Slim\Http\Response;

class ExampleController extends ApiController
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
        $examples = ['one', 'two', 'three', 'four'];

        $transformer = new Collection($examples, function ($example) {
            return [
                'example' => $example
            ];
        });

        return $this->respondWithSerializer($transformer);
    }
}
