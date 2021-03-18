<?php

namespace Farm\Animals;

class Cow extends FarmAnimal
{
    protected string $productType = "Milk";

    public function getProduct(): int
    {
        return rand(8, 12);
    }
}