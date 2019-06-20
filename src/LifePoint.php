<?php

class LifePoint
{
    private const MAX_LIFE_POINT_AT_BEGINNING = 30 ;

    public $lifePoint;

    public function __construct(int $initialLifePoint)
    {
        if ($initialLifePoint > self::MAX_LIFE_POINT_AT_BEGINNING) {
            // throw new Exception('error at LifePoint Construct : initial Life Point : ' . $initialLifePoint);
            throw new TooMuchLifePointAtBeginningException($initialLifePoint, "error at LifePoint Construct");
        }

        $this->lifePoint = $initialLifePoint;
    }
}
