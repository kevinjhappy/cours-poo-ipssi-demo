<?php

class Battle
{
    private $players;

    public function __construct(CanBattleInterface ...$players)
    {
        $this->players = $players;
    }

    public function oneRoundBattle()
    {
        $damage = 0;
        foreach($this->players as $player) {
            if ($damage !== 0) {
                $player->takeDamage($damage);
                $damage = 0;
            } elseif ($damage === 0 && $player instanceof CanBattleInterface) {
                $damage = $player->hit();
            }
        }
    }

}
