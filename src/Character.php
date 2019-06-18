<?php

abstract class Character implements CanTakeDamageInterface
{
    private const MAX_LIFE_POINT = 20;
    // attributs
    protected $lifePoint;

    public static $age = 20;

    public function __toString()
    {
        // return 'This warrior has ' . $this->lifePoint . ' and has a force of ' . $this->force ;
        return "This warrior has {$this->lifePoint} and has a force of {$this->force}" ;
        // return sprintf('This warrior has %d and has a force of %d', $this->lifePoint, $this->force);
    }

    public function takeDamage(int $damage): void
    {
        $this->lifePoint -= $damage;
    }

    /**
     * @param int[] $intList
     */
    public function test(array $intList)
    {

    }

    /**
     * @return int
     */
    public function getLifePoint(): int
    {
        return $this->lifePoint;
    }

    public static function getMaxLifePoint()
    {
        return self::MAX_LIFE_POINT;
    }

    /**
     * @return bool
     */
    // abstract public function healHimself(): bool;
}
