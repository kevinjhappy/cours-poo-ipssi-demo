<?php

class Weapon
{
    private const WEAPON_LIST_AVAILABLE = [
        'Sword' => 3,
        'Axe' => 7,
        'Bow' => 1,
        'Maul' => 8,
        'Staff' => 2
    ];

    private $type;
    private $damage;

    public function __construct(string $type)
    {
        if (!array_key_exists($type, self::WEAPON_LIST_AVAILABLE)) {
            throw new WeaponNotAvailableException("An error occurred");
        }

        $this->type = $type;
        $this->damage = self::WEAPON_LIST_AVAILABLE[$type];
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }
}
