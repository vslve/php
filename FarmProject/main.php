<?php

require 'vendor/autoload.php';

use Farm\Utils\FarmInformation;
use Farm\Utils\FarmInteraction;
use Farm\Farm;
use Farm\Animals\Cow;
use Farm\Animals\Chicken;

$farm = new Farm();
$animalsToAddToFarm = [
    10 => new Cow(),
    20 => new Chicken()
];

try {
    foreach ($animalsToAddToFarm as $animal)
    {
        $animalsCount = array_search($animal, $animalsToAddToFarm);
        FarmInteraction::addAnimalToFarm($farm, $animal, $animalsCount);
    }
} catch (TypeError $error) {
    echo $error;
}

$farm->getProductFromAllAnimals();
FarmInformation::printTotalProductCount($farm);