<?php
namespace Game\Exceptions;

class NoPotionAvailableException extends \Exception
{
    public function __toString()
    {
        return date('Y-m-d') . " No more potions available: " . $this->message;
    }
}
