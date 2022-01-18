<?php
declare(strict_types=1);
namespace App\Tests\Handler;

require_once "./vendor/autoload.php";
require_once "./required.php";

use App\Repository\CLIGameRepository;
use App\Entity\TheNumber;
use App\Exception\InvalidIntigerRange;
use App\Exception\UserMustSpecifyWords;
use App\Factory\WordCollectionFactory;
use App\Handler\GameHandler;
use App\ValueObject\GameNumber;
use App\View\CLIGameDisplay;
use PHPUnit\Framework\TestCase;

final class HandlerTest extends TestCase
{
    public function testIfGameClosesAfter3IvalidInputs(): void
    {
        $this->setOutputCallback(function(){});
        $mock = $this->createMock(CLIGameRepository::class);
        $mock->expects($this->exactly(3))
            ->method('getWords')
            ->will($this->throwException(new UserMustSpecifyWords),$this->throwException(new UserMustSpecifyWords),$this->throwException(new UserMustSpecifyWords));
        
        $app = new GameHandler($mock, new CLIGameDisplay);
        $app->play();
    }     
    
    public function testIfGameWillContinueAfterGivingWordsAndCloseAfter3InvalidInputs(): void
    {
        $this->setOutputCallback(function(){});
        $mock = $this->createMock(CLIGameRepository::class);
        $mock->expects($this->exactly(1))
            ->method('getWords')
            ->will($this->onConsecutiveCalls(WordCollectionFactory::createCollection(['Foo', 'Bar', 'Baz'])));
        $mock->expects($this->exactly(3))
            ->method('getNumber')
            ->will($this->throwException(new InvalidIntigerRange),$this->throwException(new InvalidIntigerRange),$this->throwException(new InvalidIntigerRange));
        
        $app = new GameHandler($mock, new CLIGameDisplay);
        $app->play();
    } 
    
    public function testIfGameWillContinueAfterGivingWordsAndCloseAfter3ValidInputsAnd3InvalidInputs(): void
    {
        $this->setOutputCallback(function(){});
        $mock = $this->createMock(CLIGameRepository::class);
        $mock->expects($this->exactly(1))
            ->method('getWords')
            ->will($this->onConsecutiveCalls(WordCollectionFactory::createCollection(['Foo', 'Bar', 'Baz'])));
        $mock->expects($this->exactly(6))
            ->method('getNumber')
            ->will(
                $this->onConsecutiveCalls(
                    new TheNumber(new GameNumber(2)),
                    new TheNumber(new GameNumber(2)),
                    new TheNumber(new GameNumber(2)),
                    $this->throwException(new InvalidIntigerRange),
                    $this->throwException(new InvalidIntigerRange),
                    $this->throwException(new InvalidIntigerRange))
                );
            
        $app = new GameHandler($mock, new CLIGameDisplay);
        $app->play();
    }         
}