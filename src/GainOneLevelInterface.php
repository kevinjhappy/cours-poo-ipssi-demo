<?php

interface GainOneLevelInterface
{
    public function gainOneLevel(int $forceStat, int $defenseStat, bool $checkAverage = false): int;
}
