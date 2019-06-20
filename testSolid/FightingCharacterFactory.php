<?php


final class FightingCharacterFactory
{
    public function getInstance(string $characterType, array $data): CanBattleInterface
    {
        switch($characterType) {
            case 'Warrior':
                return new \Game\Warrior($data[0], $data[1], $data[3]);
            case 'Wizard':
                return new Wizard($data[0], $data[1], $data[3]);
        }
    }
}
