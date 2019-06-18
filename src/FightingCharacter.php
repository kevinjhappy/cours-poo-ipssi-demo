<?php

abstract class FightingCharacter extends Character implements CanBattleInterface
{
    protected $force;

    public function hit(): int
    {
        return $this->force;
    }
}
