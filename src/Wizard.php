<?php

class Wizard extends FightingCharacter implements CanHealHimselfInterface,
    ManaPointInterface,
    CanWalkInterface
{
    use HealWithMagicTrait, HealWithPotionTrait {
        HealWithMagicTrait::heal insteadof HealWithPotionTrait;
    }

    const MAX_LIFE_POINT = 15;

    private $manaPoint;
    private $level;

    public static $age = 23;

    public function __construct($lifePoint, $manaPoint, $force, $level = 1)
    {
        $this->lifePoint = $lifePoint;
        $this->manaPoint = $manaPoint;
        $this->force = $force;
        $this->level = $level;
    }

    public function getManaPoint(): int
    {
        return $this->manaPoint;
    }

    public function useManaPoint(int $usedManaPoint): void
    {
        $this->manaPoint -= $usedManaPoint;
    }

    public function healHimself(): bool
    {
        if ($this->manaPoint >= 2) {
            $this->setLifePointReceived(4);
            $this->lifePoint += $this->heal();
            $this->manaPoint -= $this->manaPointSpent;
            return true;
        }

        $this->lifePoint += $this->healWithPotion();

        return true;
    }

    public static function getAge()
    {
        return self::$age;
    }

    public function walk(): bool
    {
        // TODO: Implement walk() method.
    }
}
