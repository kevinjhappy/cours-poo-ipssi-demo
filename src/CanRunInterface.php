<?php

interface CanRunInterface
{
    public function run(): bool;

    public function walk(): bool;
}
