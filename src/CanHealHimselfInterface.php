<?php

interface CanHealHimselfInterface
{
    const MAX_HEALING_POINT_IN_ONE_TIME = 5;

    public function healHimself(): bool;
}
