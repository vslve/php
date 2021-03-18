<?php

namespace Farm\Animals;

abstract class FarmAnimal
{
    protected int $id;
    protected string $productType;

    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    abstract public function getProduct(): int;

    public function getProductType(): string
    {
        return $this->productType;
    }

    public function getAnimalId(): int
    {
        return $this->id;
    }

    public function setAnimalId(int $id)
    {
        $this->id = $id;
    }
}