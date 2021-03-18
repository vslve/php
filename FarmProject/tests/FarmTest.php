<?php

require '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Farm\Farm;
use Farm\Utils\FarmInteraction;
use Farm\Animals\Cow;
use Farm\Animals\Chicken;

class FarmTest extends TestCase
{
    public function test()
    {
        for ($i = 0; $i < 100; ++$i) {
            $this->testFarm();
        }
    }

    private function testFarm()
    {
        $farm = new Farm();
        $firstAnimalCount = 0;
        $secondAnimalCount = 0;
        $firstAnimal = new Cow();
        $secondAnimal = new Chicken();

        for ($startCount = rand(0, 10); $startCount < 100; $startCount += rand(5, 10)) {
            $firstAnimalCount += $startCount;
            $secondAnimalCount += $startCount + 10;
            $listSize = $startCount === 0 ? 1 : 2;

            FarmInteraction::addAnimalToFarm($farm, $firstAnimal, $startCount);
            FarmInteraction::addAnimalToFarm($farm, $secondAnimal, $startCount + 10);
            $this->testGetTotalAnimalsCount($farm, $firstAnimalCount + $secondAnimalCount);
            if ($listSize == 2) {
                $this->testGetAllAnimalsList($farm, $listSize, $firstAnimalCount, get_class($firstAnimal));
                $this->testGetAllAnimalsList($farm, $listSize, $secondAnimalCount, get_class($secondAnimal));
            } else if ($listSize == 1) {
                $this->testGetAllAnimalsList($farm, $listSize, $secondAnimalCount, get_class($secondAnimal));
            }
        }
    }

    private function testGetTotalAnimalsCount(Farm $farm, int $count)
    {
        $this->assertSame($count, $farm->getTotalAnimalsCount());
    }

    private function testGetAllAnimalsList(Farm $farm, int $listSize, int $animalCount, string $animalType)
    {
        $this->assertSame($listSize, count($farm->getAllAnimalsList()));
        $this->assertSame($animalCount, count($farm->getAllAnimalsList()[ucfirst($animalType)]));
    }

    public function testAddAnimals()
    {
            $farm = new Farm();
            $this->expectException(TypeError::class);
            FarmInteraction::addAnimalToFarm($farm, new Farm(), 10);
    }
}

