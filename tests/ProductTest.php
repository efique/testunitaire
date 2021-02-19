<?php

namespace App\tests;

use App\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    // public function setUpBeforeClass(): void
    // {
    //     echo 'setUpBeforeClass'.PHP_EOL;
    // }

    // public function setUp(): void
    // {
    //     echo 'setUp'.PHP_EOL;
    // }

    /** @dataProvider getProductFood */
    public function testProductFood($produit, $expected)
    {
        // $produit = new Product('produit', Product::FOOD_PRODUCT, 10);
        $result = $produit->computeTva();

        $this->assertSame($expected, $result);
    }

    public function testTvaWithNegativePrice()
    {
        $produit = new Product('produit', 'test', -1);

        $this->expectException('LogicException');

        $produit->computeTva();
    }

    public function getProductFood()
    {
        return [
            'test avec produit food' => [new Product('produit', Product::FOOD_PRODUCT, 10), 0.55],
            'test sans produit food' => [new Product('produit', 'test', 10), 1.96,]
        ];
    }

    // public function tearDown(): void
    // {
    //     echo 'tearDown'.PHP_EOL;
    // }

    // public function tearDownAfterClass(): void
    // {
    //     echo 'tearDownAfterClass'.PHP_EOL;
    // }
}
