<?php

final class BlackWizard extends Wizard
{
    private $chaosPoint;
    protected $manaPoint;

    public function __construct($lifePoint, $manaPoint, $chaosPoint, $level = 1)
    {
        parent::__construct($lifePoint, $manaPoint, $level);

        $this->chaosPoint = $chaosPoint;
    }

    public function sendChaosMagic()
    {
        $this->useManaPoint(1);
        $this->chaosPoint -= 1;
    }

    // mauvaise implémentation de la fonction, celle ci ne respecte pas le comportement de la fonction mère
    public function getManaPoint(): int
    {
        return $this->lifePoint;
    }

    // de même ici, la fonction est vide, elle écrase la classe mère
    public function useManaPoint(int $usedManaPoint): void
    {

    }

}
