<?php
namespace Game\Exceptions;

class TooMuchLifePointAtBeginningException extends \LogicException
{
    private $initialLifePoint;

    public function __construct($initialLifePoint, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->initialLifePoint = $initialLifePoint;
    }

    public function getCustomMessage(): string
    {
        return $this->getMessage() . ' initial Life Point : ' . $this->initialLifePoint;
    }
}
