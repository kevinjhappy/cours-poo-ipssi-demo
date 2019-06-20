<?php

class objectCalisthenics
{

    /**
    public function test($riri, $fifi, $loulou)
    {
        if ($riiri > $loulou && $loulu < $fifi && );
    }
     */

    public function test(array $riri, $fifi, $loulou)
    {
        foreach ($riri as $item) {
            if ($fifi > $loulou) {
                // wrong because 2 indentations
                return ;
            }
            $this->secondFunctionThatDoesTheForeach();

        }
    }


}
