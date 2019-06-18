<?php

require 'src/CanHealHimselfInterface.php';
require 'src/Character.php';
require 'src/Warrior.php';
require 'src/Wizard.php';


$livePointPotion = Warrior::getLifePointForPotion();

$warrior1 = new Warrior(10, 2, 3);
$warrior2 = new Warrior(20, 3, 2);

$warrior3 = clone $warrior1;

$wizard1 = new Wizard(15, 18, 2);
$wizard1->takeDamage(3);

// 20
echo Character::getMaxLifePoint();

// 15
echo Wizard::MAX_LIFE_POINT;

// 20
echo Wizard::getMaxLifePoint();

echo Wizard::getAge();

function battle(Character $character){
    var_dump($character->healHimself());
}


function healYourself(CanHealHimselfInterface $character) {
    if ($character->healHimself() === true) {
        return "the character succeed to heal himself";
    }

    return "The character did not succeed to heal Himself";
}

healYourself($wizard1);

battle($warrior1);
die;

$warriorStatic = Warrior::create();
var_dump($warriorStatic);

$warrior2Damage = $warrior2->giveDamage();

$warrior1->takeDamage($warrior2Damage);

echo $warrior1->getLifePoint();
echo $warrior1->getForce();

echo Warrior::getMaxLifePoint();

echo "\n";

var_dump($warrior1->isUnderAverageLevel());
var_dump($warrior2->isUnderAverageLevel());

Warrior::increaseAverageLevel();
Warrior::increaseAverageLevel();

var_dump(Warrior::getAverageLevel());

$warrior3 = new Warrior(10, 2, 5);
var_dump($warrior3->isUnderAverageLevel());
