<?php

namespace App\tests;

use App\ProductExo;
use PHPUnit\Framework\TestCase;

class ProductExoTest extends TestCase
{
    /** @dataProvider getCalculRemise */
    public function testProductExo($produit, $expected)
    {
        $result = $produit->calculRemise();

        $this->assertSame($expected, $result[0]);
    }

    public function testNegativePrice()
    {
        $produit = new ProductExo(5, -1);

        $this->expectException('LogicException');

        $produit->calculRemise();
    }

    public function getCalculRemise()
    {
        return [
            [new ProductExo(1, 99), (float)105],
            [new ProductExo(1, 100), (float)101],
            [new ProductExo(1, 200), (float)196],
            [new ProductExo(1, 201), (float)186.9],
            [new ProductExo(1, 400),(float)368],
            [new ProductExo(1, 500), (float)460],
            [new ProductExo(1, 501),(float)450.9]
        ];
    }
}
