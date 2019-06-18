<?php

class Warrior extends FightingCharacter
    implements CanHealHimselfInterface,
    GainOneLevelInterface,
    CanRunInterface
{
    private $potionNumber = 3;
    private $level;

    private $stamina = 10;

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
        echo 'Cloned Object';
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

    public function setLifePoint(int $lifePoint)
    {
        $this->lifePoint = $lifePoint;
    }

    /**
     * @return bool
     * @throws NoPotionAvailableException
     */
    public function healHimself(): bool
    {
        if (!$this->isPotionAvailable()) {
            throw new NoPotionAvailableException();
        }

        if ($this->lifePoint >= Character::getMaxLifePoint()) {
            throw new CharacterAtFullLifeException("Character is already at full life");
        }

        $healResult = $this->usePotionToHeal();

        return $healResult;

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

    public function run(): bool
    {
        if ($this->stamina <= 1) {
            return false;
        }
        $this->stamina-= 2;

        return true;
    }

    public function walk(): bool
    {
        if ($this->stamina === 0) {
            return false;
        }
        $this->stamina--;

        return true;
    }

}
