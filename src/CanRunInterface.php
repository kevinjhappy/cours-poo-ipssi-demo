<?php

interface CanRunInterface extends CanWalkInterface
{
    public function run(): bool;
}
