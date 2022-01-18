<?php
declare(strict_types=1);
namespace App\Tests\Factory;

require_once "./vendor/autoload.php";
require_once "./required.php";

use App\Factory\NumberFactory;
use App\Entity\TheNumber;
use App\Exception\InvalidIntigerRange;
use App\Exception\ValueMustBeInt;
use App\ValueObject\GameNumber;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    private NumberFactory $factory;

    public function setUp(): void 
    {
        $this->factory = new NumberFactory();    
    }

    public function testCanCreateEntityFromValidInput(): void
    {
        $this->assertEquals($this->factory->createNumber(1), new TheNumber(new GameNumber(1)));
    }       
    
    public function testCannotCreateEntityFromString(): void
    {
        $this->expectException(ValueMustBeInt::class);
        $this->factory->createNumber("NaN");
    }    
    
    public function testCannotCreateEntityFromTooBigInt(): void
    {
        $this->expectException(InvalidIntigerRange::class);
        $this->factory->createNumber(5000);
    }       
    
    public function testCannotCreateEntityFromTooSmallInt(): void
    {
        $this->expectException(InvalidIntigerRange::class);
        $this->factory->createNumber(0);
    }    
    
}