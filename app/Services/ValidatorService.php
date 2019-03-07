<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/03/19
 * Time: 02.53
 */

namespace App\Services;

use App\Validations\Validator;

class ValidatorService
{
    /**
     * @return Validator
     */
    public function __invoke()
    {
        return new Validator;
    }
}