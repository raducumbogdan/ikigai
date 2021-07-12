<?php

namespace App\Exceptions;

use http\Env\Request;
use Throwable;

/**
 * Class ValidatorException
 * @package App\Exceptions
 */
class ValidatorException extends \Exception
{
    /**
     * @var
     */
    private $validateCode;
    private $validateErrors;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setValidateErrors($message);
    }

    /**
     * @return mixed
     */
    public function getValidateCode()
    {
        return $this->validateCode;
    }

    /**
     * @param mixed $validateCode
     */
    public function setValidateCode($validateCode): void
    {
        $this->validateCode = $validateCode;
    }

    /**
     * @return mixed
     */
    public function getValidateErrors()
    {
        return $this->validateErrors;
    }

    /**
     * @param mixed $validateErrors
     */
    public function setValidateErrors($validateErrors): void
    {
        $this->validateErrors = $validateErrors;
    }
}
