<?php

interface ManaPointInterface
{
    public function getManaPoint(): int;

    public function useManaPoint(int $usedManaPoint): void;
}
