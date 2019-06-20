<?php
declare(strict_types=1);

namespace Game;

use Game\Exceptions\{CharacterAtFullLifeException,NoPotionAvailableException};
use Game\Model\Exception\NoPotionAvailableException as NoPotionInModel;

class Warrior extends FightingCharacter
    implements CanHealHimselfInterface,
    GainOneLevelInterface,
    CanRunInterface,
    Countable
{
    private $potionNumber = 3;
    private $level;

    public $stamina = 10;

    private static $averageLevel = 1 ;

    private $weaponList;

    private static $numberOfWarriorCreated = 0;

    public function __construct(LifePoint $lifePoint, ?int $force, int $level = 1)
    {
        if ($force === null) {
            $this->force = 1;
        } else {
            $this->force = $force;
        }
        $this->lifePoint = $lifePoint;
        $this->level = $level;

        self::$numberOfWarriorCreated++;
    }

    public function isUnderAverageLevel(): ?bool
    {
        if (self::$averageLevel <= 0) {
            return null;
        }

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

    public static function increaseAverageLevel(): void
    {
        self::$averageLevel++;
    }

    public static function getAverageLevel(): int
    {
        return self::$averageLevel;
    }

    public static function create(): self
    {
        return new self(15, 3);
    }

    public static function getLifePointForPotion(): int
    {
        return self::MAX_HEALING_POINT_IN_ONE_TIME;
    }

    public function setLifePoint(LifePoint $lifePoint): void
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

    private function usePotionToHeal(): bool
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

    /**
     * @return LifePoint
     */
    public function retrieveLifePoint(): array
    {
        return $this->lifePoint;
    }

    /**
     * @return Weapon[]
     */
    public function getWeaponList(): array
    {
        return $this->weaponList;
    }

    /**
     * @param Weapon $weapon
     * @return bool
     */
    public function addNewWeapon(Weapon $weapon): bool
    {
        if (in_array($weapon, $this->weaponList)) {
            return false;
        }
        $this->weaponList[] = $weapon;

        return true;
    }

    public function count()
    {
        return self::$numberOfWarriorCreated;
    }


}
