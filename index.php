<?php

/**
function __autoload($class)
{
    if (strpos($class, 'Exception') !== false) {
        require_once 'src/Exceptions/' . $class . '.php';
    } else {
        require_once 'src/' . $class . '.php';
    }
}
*/

function autoloadSource($class)
{
    if (strpos($class, 'Exception') !== false) {
        require_once 'src/Exceptions/' . $class . '.php';
    } else {
        require_once 'src/' . $class . '.php';
    }
}

spl_autoload_register('autoloadSource');


/**
require 'src/NoPotionAvailableException.php';
require 'src/CharacterAtFullLifeException.php';
require 'src/CanHealHimselfInterface.php';
require 'src/GainOneLevelInterface.php';
require 'src/ManaPointInterface.php';
require 'src/CanWalkInterface.php';
require 'src/CanRunInterface.php';
require 'src/CanTakeDamageInterface.php';
require 'src/HealWithMagicTrait.php';
require 'src/HealWithPotionTrait.php';
require 'src/HealWithSomethingTrait.php';
require 'src/CanHitInterface.php';
require 'src/CanBattleInterface.php';
require 'src/Character.php';
require 'src/FightingCharacter.php';
require 'src/Warrior.php';
require 'src/Wizard.php';
require 'src/BlackWizard.php';
require 'src/Battle.php';
*/

$livePointPotion = WarriorNamespace\Warrior::getLifePointForPotion();

$lifePoint = new LifePoint(18);
$lifePoint2 = new LifePoint(20);

$weapon = new Weapon('Sword');
$weapon2 = $weapon;


var_dump($weapon);

try {
    $lifePoint3 = new LifePoint(40);
} catch (TooMuchLifePointAtBeginningException $exception) {
    echo $exception->getCustomMessage();
}

$warrior1 = new Warrior($lifePoint, 3, 2);

echo "\n";
$arrayObject = new ArrayObject($warrior1);

echo $arrayObject['stamina'];
echo "\n";
var_dump($warrior1);

$reflectionObject = new ReflectionObject($warrior1);

echo "\n". count($warrior1) . "\n";
$warrior2 = new Warrior($lifePoint2, 3, 2);

$warrior3 = clone $warrior1;
$wizard1 = new Wizard(15, 18, 1, 4);

echo "\n". count($warrior1) . "\n";

try {
    var_dump($warrior1->healHimself());
    var_dump($warrior1->healHimself());
} catch (NoPotionAvailableException $exception) {
    echo "NoPotionAvailableException: I tried to heal the warrior and got this error : " . $exception;
} catch (CharacterAtFullLifeException $exception) {
    echo $exception->getMessage();
} catch (Exception $exception) {
    echo "I got this error : " . $exception->getMessage();
} finally {
    echo "The warrior finished to try healing";
}

$battle = new Battle($warrior1, $warrior2, $warrior3, $wizard1);
$battle->oneRoundBattle();

var_dump($warrior2);
var_dump($wizard1);



$wizard1 = new Wizard(15, 18, 2);
$wizard1->takeDamage(3);

// 20
echo Character::getMaxLifePoint();

// 15
echo Wizard::MAX_LIFE_POINT;

// 20
echo Wizard::getMaxLifePoint();

echo Wizard::getAge();


function healYourself(CanHealHimselfInterface $character) {
    try {
        if ($character->healHimself() === true) {
            return "the character succeed to heal himself";
        }
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    return "The character did not succeed to heal Himself";
}

healYourself($wizard1);

$warriorStatic = Warrior::create();
var_dump($warriorStatic);

$warrior2Damage = $warrior2->hit();

$warrior1->takeDamage($warrior2Damage);

echo $warrior1->getLifePoint();
echo $warrior1->hit();

echo Warrior::getMaxLifePoint();

echo "\n";

var_dump($warrior1->isUnderAverageLevel());
var_dump($warrior2->isUnderAverageLevel());

Warrior::increaseAverageLevel();
Warrior::increaseAverageLevel();

var_dump(Warrior::getAverageLevel());

$warrior3 = new Warrior(10, 2, 5);
var_dump($warrior3->isUnderAverageLevel());


function runToNextCity(CanRunInterface $canRun) {
    if (!$canRun->run()) {
        $canRun->walk();
        return "arrived to City in 15 minutes";
    }
    return "arrived to City in 5 minutes";
}

function walkToNextCity(CanWalkInterface $canWalk) {
    $canWalk->walk();
    return "arrived to City in 15 minutes";
}

echo runToNextCity($warrior1);

echo "\n\n";

function useManapoint(Wizard $wizard)
{
    $wizard->useManaPoint(2);
    echo $wizard->getManaPoint();
}

$blackWizard = new BlackWizard(15, 18, 5, 3);

useManaPoint($blackWizard);

