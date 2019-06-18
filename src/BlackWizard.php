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

}
