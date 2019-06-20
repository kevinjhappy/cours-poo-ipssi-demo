<?php

abstract class FightingCharacter extends Game\Character implements CanBattleInterface
{
    protected $force;

    public function hit(): int
    {
        return $this->force;
    }
}
