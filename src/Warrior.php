<?php

class Warrior extends Character implements CanHealHimselfInterface, GainOneLevelInterface
{
    // attributs
    private $force;

    private $potionNumber = 3;
    private $level;

    private static $averageLevel = 1 ;

    public function __construct($lifePoint, $force, $level = 1)
    {
        $this->force = $force;
        $this->lifePoint = $lifePoint;
        $this->level = $level;
    }

    public function isUnderAverageLevel()
    {
        return $this->level <= self::$averageLevel;
    }

    public function __clone()
    {
        echo 'Object cloné';
    }

    public function __call($name, $arguments)
    {
        echo "the function $name does not exist";
    }



    public function __sleep()
    {
        return array('lifePoint','force');
    }

    public function __wakeup()
    {
        echo 'Unserialize called';
    }



    public static function increaseAverageLevel()
    {
        self::$averageLevel++;
    }

    public static function getAverageLevel()
    {
        return self::$averageLevel;
    }

    public static function create()
    {
        return new self(15, 3);
    }



    public static function getLifePointForPotion()
    {
        return self::MAX_HEALING_POINT_IN_ONE_TIME;
    }

    public static function getPotionNumber($data)
    {
        return 3 + $data ;
    }

    // methodes


    public function giveDamage()
    {
        return $this->force ;
    }



    public function setLifePoint(int $lifePoint)
    {
        $this->lifePoint = $lifePoint;
    }

    public function getForce()
    {
        return $this->force;
    }


    public function healHimself(): bool
    {
        if ($this->isPotionAvailable()) {
            $healResult = $this->usePotionToHeal();

            return $healResult;
        }

        return $this->rest();
    }

    private function usePotionToHeal()
    {
        if ($this->isPotionAvailable()) {
            $this->potionNumber--;
            $this->lifePoint += self::getLifePointForPotion();

            return true;
        }

        return false;
    }

    private function rest()
    {
        $this->lifePoint++;
        return true;
    }

    private function isPotionAvailable()
    {
        return $this->potionNumber > 0;
    }

    public function gainOneLevel(int $forceStat, int $defenseStat, bool $checkAverage = false): int
    {
        // TODO: Implement gainOneLevel() method.
    }

}
