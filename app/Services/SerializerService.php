<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/03/19
 * Time: 01.49
 */

namespace App\Services;

use App\Serializers\CustomSerializer;
use League\Fractal\Manager;

class SerializerService
{
    /**
     * @return Manager
     */
    public function __invoke()
    {
        $serializer = new Manager;
        $serializer->setSerializer(new CustomSerializer);
        $serializer->parseIncludes(request('include', []));

        return $serializer;
    }
}