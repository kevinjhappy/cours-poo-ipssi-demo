<?php

class Wizard extends Character implements CanHealHimselfInterface
{
    const MAX_LIFE_POINT = 15;

    private $manaPoint;
    private $level;

    public static $age = 23;

    public function __construct($lifePoint, $manaPoint, $level = 1)
    {
        $this->lifePoint = $lifePoint;
        $this->manaPoint = $manaPoint;
        $this->level = $level;
    }

    public function getManaPoint()
    {
        return $this->manaPoint;
    }

    public function useManaPoint($usedManaPoint)
    {
        $this->manaPoint -= $usedManaPoint;
    }

    public function healHimself(): bool
    {
        if ($this->manaPoint >= 2) {
            $this->manaPoint -= 2;
            $this->lifePoint += 4;

            return true;
        }

        return false;
    }

    public static function getAge()
    {
        return self::$age;
    }
}
