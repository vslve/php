<?php

namespace Farm;

use Farm\Animals\FarmAnimal;

class Farm
{
    private int $totalAnimalsCount;
    private int $totalProductCount;

    /**
     * @var array string animalType => [FarmAnimal animal]
     */
    private array $animalsMap = [];
    /**
     * @var array string productType => int productCount
     */
    private array $productsMap = [];

    public function __construct()
    {
        $this->totalProductCount = 0;
        $this->totalAnimalsCount = 0;
    }

    public function getTotalAnimalsCount(): int
    {
        return $this->totalAnimalsCount;
    }

    public function getTotalProductCount(): int
    {
        return $this->totalProductCount;
    }

    public function getProductFromAllAnimals(): void
    {
        foreach ($this->animalsMap as $animals) {
            foreach ($animals as $animal) {
                $productCount = $animal->getProduct();
                $productType = strtolower($animal->getProductType());
                if (!array_key_exists($productType, $this->productsMap)) {
                    $this->productsMap[$productType] = 0;
                }
                $this->productsMap[$productType] += $productCount;
                $this->totalProductCount += $productCount;
            }
        }
    }

    public function addAnimal(FarmAnimal $animal): void
    {
        $animalClass = get_class($animal);
        if (!array_key_exists($animalClass, $this->animalsMap)) {
            $this->animalsMap[$animalClass] = [];
        }
        $animal->setAnimalId(++$this->totalAnimalsCount);
        array_push($this->animalsMap[$animalClass], $animal);
    }

    public function getAllAnimalsList(): array
    {
        return $this->animalsMap;
    }

    public function getAllProductsList(): array
    {
        return $this->productsMap;
    }


}