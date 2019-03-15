<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 25/11/18
 * Time: 21.38
 */

namespace App\Validations;

use Respect\Validation\Exceptions\NestedValidationException;
use Slim\Http\Request;

class Validator
{
    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @param Request $request
     * @param array $rules
     *
     * @return $this
     */
    public function validate(Request $request, array $rules) : self
    {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(str_replace('_', ' ', strtolower($field)))
                    ->assert($request->getParam($field));
            } catch (NestedValidationException $e) {
                $this->setErrors($field, $e->getMessages());
            }
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid() : bool
    {
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors() : array
    {
        return $this->errors;
    }

    /**
     * @param $field
     * @param array $errors
     *
     * @return $this
     */
    public function setErrors($field, array $errors) : self
    {
        $this->errors[$field] = $errors;

        return $this;
    }
}