<?php

class test
{
    public function login($email, $password)
    {
        $this->connect($email, $password);
    }

    public function verifyEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception();
        }
    }
}

class ServiceUser
{
    public function connectTheUser($user)
    {
        $test = new Test();
        $test->verifyEmail($user->email);
        $test->login($user->email, $user->password);
    }
}


class Car
{
    public function __construct($engineType)
    {
        switch ($engineType) {
            case ‘fuel’:
                $this->engine = new FuelEngine;
                break;
            case ‘diesel’:
                $this->engine = new DieselEngine;
                break;
            case ‘electric’:
                $this->engine = new ElectricEngine;
                break;
            case 'hybrid':
                $this->engine = new EngineHybrid;
                break;
            default:
                throw new \Exception('not supported engineType : '. $engineType);
        }
    }
}

class CarRefacto
{
    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }
}

function addOneUnity(&$int)
{
    $int++;
}

$int = 3;
addOneUnity($int);
