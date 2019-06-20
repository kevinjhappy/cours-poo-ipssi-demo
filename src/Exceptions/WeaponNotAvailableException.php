<?php
namespace Game\Exceptions;


class WeaponNotAvailableException extends \InvalidArgumentException
{
    const CUSTOM_MESSAGE = ' The weapon was not right.';

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $newMessage = $message . self::CUSTOM_MESSAGE;
        parent::__construct($newMessage, $code, $previous);
    }
}
