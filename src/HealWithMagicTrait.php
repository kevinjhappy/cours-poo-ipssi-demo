<?php

trait HealWithMagicTrait
{
    public $lifePointReceived = 1;
    public $manaPointSpent = 2;

    public function setLifePointReceived(int $lifePoint)
    {
        $this->lifePointReceived = $lifePoint;
    }

    public function heal()
    {
        $this->manaPointSpent -= 2 ;
        return $this->lifePointReceived;
    }
}
