<?php

namespace App;

use LogicException;

class Product
{
    /** @var string */
    const FOOD_PRODUCT = 'food';
    /** @var string */
    private $name;
    /** @var string */
    private $type;
    /** @var float */
    private $price;
    
    public function __construct(string $name, string $type, float $price)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
    }

    public function computeTva()
    {
        if($this->price < 0) {
            throw new LogicException('la tva et le prix ne peuvent pas être négatif');
        }
        if (self::FOOD_PRODUCT == $this->type) {
            return $this->price * 0.055;
        }

        return $this->price * 0.196;
    }
}