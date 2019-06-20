<?php

function generatorFromOneToFive()
{
    for($i = 1 ; $i <= 5; $i++){
        yield $i;
    }
}

function test()
{
    yield 3;
    yield 5;
    yield 8;
}

$generator = test();

var_dump($generator);

foreach($generator as $value) {
    echo $value;
}