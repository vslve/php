<?php

namespace Farm\Utils;

use Farm\Farm;

class FarmInformation
{
    static function printTotalAnimalsCount(Farm $farm)
    {
        echo "Total animals: ".$farm->getTotalAnimalsCount()."\n";

        $animals = $farm->getAllAnimalsList();
        for($i = 0; $i < count($animals); ++$i) {
            $animalType = array_keys($animals)[$i];
            echo $animalType."'s count: ".count($animals[$animalType]);
            echo "\n";
        }


    }

    static function printTotalProductCount(Farm $farm)
    {
        echo "Total product count: ".$farm->getTotalProductCount()."\n";

        $products = $farm->getAllProductsList();
        foreach ($products as $product) {
            echo array_search($product, $products).": ".$product."\n";
        }
    }

    static function printAnimalsIdGroupedByTypes(Farm $farm)
    {
        $animals = $farm->getAllAnimalsList();
        for($i = 0; $i < count($animals); ++$i) {
            $animalType = array_keys($animals)[$i];
            echo $animalType."'s id: \n";
            foreach ($animals[$animalType] as $animal) {
                echo $animal->getAnimalId().' ';
            }
            echo "\n";
        }
    }
}