<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/03/19
 * Time: 01.46
 */

namespace App\Serializers;

use League\Fractal\Serializer\DataArraySerializer;

class CustomSerializer extends DataArraySerializer
{
    /**
     * @param $transformedData
     * @param $includedData
     *
     * @return array
     */
    public function mergeIncludes($transformedData, $includedData):? array
    {
        $includedData = array_map(function ($include) {
            return $include['data'];
        }, $includedData);

        return parent::mergeIncludes($transformedData, $includedData);
    }
}