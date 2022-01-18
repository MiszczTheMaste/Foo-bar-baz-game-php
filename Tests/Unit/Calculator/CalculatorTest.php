<?php
declare(strict_types=1);
namespace App\Tests\Calculator;

require_once "./vendor/autoload.php";
require_once "./required.php";

use App\Calculator\FooBarCalculator;
use App\Entity\TheNumber;
use App\Factory\WordCollectionFactory;
use App\ValueObject\GameNumber;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    private FooBarCalculator $calulator;

    public function setUp(): void 
    {
        $wordCollection = WordCollectionFactory::createCollection(['Foo', 'Bar', 'Baz']);
        $this->calulator = new FooBarCalculator($wordCollection);    
    }

    public function testCanEvaluateOne(): void
    {
        $this->assertEquals($this->calulator->evaluate(new TheNumber(new GameNumber(1))), "Foo");
    }    
    
    public function testCanEvaluatePrimeNumbers(): void
    {
        $expectedCollection = [];
        for($i = 0; $i < 6; $i++){
            $expectedCollection[] = "Foo Bar Baz";
        }
        $recievedCollection[0] = $this->calulator->evaluate(new TheNumber(new GameNumber(2)));
        $recievedCollection[1] = $this->calulator->evaluate(new TheNumber(new GameNumber(3)));
        $recievedCollection[2] = $this->calulator->evaluate(new TheNumber(new GameNumber(5)));
        $recievedCollection[3] = $this->calulator->evaluate(new TheNumber(new GameNumber(7)));
        $recievedCollection[4] = $this->calulator->evaluate(new TheNumber(new GameNumber(11)));
        $recievedCollection[5] = $this->calulator->evaluate(new TheNumber(new GameNumber(13)));

        $this->assertEquals($expectedCollection, $recievedCollection);
    }

    public function testCanEvaluateDivisibleByTwo(): void
    {
        $this->assertEquals($this->calulator->evaluate(new TheNumber(new GameNumber(4))), "Bar");
    }      
    
    public function testCanEvaluateDivisibleByThree(): void
    {
        $this->assertEquals($this->calulator->evaluate(new TheNumber(new GameNumber(9))), "Baz");
    }  
    
    public function testCanEvaluateDivisibleByTwoAndThree(): void
    {
        $this->assertEquals($this->calulator->evaluate(new TheNumber(new GameNumber(60))), "Bar Baz");
    }  
}