<?php

require_once 'src/OrderCalculator.php';

use PHPUnit\Framework\Dataprovider;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase {

    /*
        Positive testing. Valid inputs are tested
     */
    
    public function testCalculatePriceBeforeDiscount(): void 
    {
        // arrange
        $unitPrice = 100;
        $quantity = 5;
        $taxRate = 0.2;
        $expected = 500;

        $orderCalculator = new OrderCalculator($unitPrice, $quantity, $taxRate);
        
        // act
        $result = $orderCalculator->calculateTotalPrice();

        // assert
        $this->assertEquals($expected, $result);
    }

    public function testPricesAfterBulkDiscount(): void 
    {
        // arrange
        $unitPrice = 100;
        $quantity = 5;
        $taxRate = 0.2;
        $expected = 600;

        $orderCalculator = new OrderCalculator($unitPrice, $quantity, $taxRate);

        // act
        $result = $orderCalculator->calculateFinalPrice();
        
        // assert
        $this->assertEquals($expected, $result);
    }

    public function testCalculateFinalPriceAppliesReturnsFloat(): void
    {
        // arrange
        $unitPrice = 100;
        $quantity = 5;
        $taxRate = 0.2;

        $orderCalculator = new OrderCalculator($unitPrice, $quantity, $taxRate);

        // act
        $result = $orderCalculator->calculateFinalPrice();

        // assert
        $this->assertIsFloat($result);
    }




}