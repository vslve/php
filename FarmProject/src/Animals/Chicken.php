<?php

namespace Farm\Animals;

class Chicken extends FarmAnimal
{
    protected string $productType = "Egg";

    public function getProduct(): int
    {
        return rand(0, 1);
    }
}