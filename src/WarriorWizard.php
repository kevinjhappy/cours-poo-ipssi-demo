<?php

class WarriorWizard extends Wizard
{
     use ForceTrait;

     public function __construct($lifePoint, $manaPoint, $force, $level = 1)
     {
         parent::__construct($lifePoint, $manaPoint, $level);

         $this->force = $force;
     }


}