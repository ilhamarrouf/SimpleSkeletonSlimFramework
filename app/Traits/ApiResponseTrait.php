<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/03/19
 * Time: 02.30
 */

namespace App\Traits;

use Slim\Http\Response;

trait ApiResponseTrait
{
    /**
     * @param $data
     *
     * @return Response
     */
    public function respondWithSerializer($data) : Response
    {
        return response()->withJson(
            container()->get('serializer')->createData($data)->toArray()
        );
    }
}