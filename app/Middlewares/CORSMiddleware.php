<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 07/03/19
 * Time: 17.32
 */

namespace App\Middlewares;

use Slim\Http\Request;
use Slim\Http\Response;

class CORSMiddleware extends Middleware
{
    /**
     * @param Request $request
     * @param Response $response
     * @param $next
     *
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        $response = $next($request, $response);

        return $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTION');
    }
}