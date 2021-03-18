<?php

namespace Farm\Utils;

use Farm\Farm;
use Farm\Animals\FarmAnimal;

class FarmInteraction
{
    public static function addAnimalToFarm(Farm $farm, FarmAnimal $animal, int $count)
    {
        for ($i = 0; $i < $count; ++$i)
        {
            $farm->addAnimal(new $animal());
        }
    }
}