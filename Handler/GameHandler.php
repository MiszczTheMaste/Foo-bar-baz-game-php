<?php
namespace App\Handler;

require_once "required.php";

use App\View\GameDisplay;
use App\Entity\TheNumber;
use App\Repository\GameRepository;
use App\Calculator\FooBarCalculator;
use App\Entity\WordCollection;

class GameHandler
{
    private GameDisplay $display;
    private GameRepository $repository;
    private TheNumber $currentNumber;
    private WordCollection $currentWords;
    private FooBarCalculator $fooBarLogic;

    private int $invalidInputsCount = 0;
    const MAX_INPUT_TRIES = 3;

    public function __construct(GameRepository $repository, GameDisplay $display)
    {
        $this->display = $display;
        $this->repository = $repository;
    }

    public function play()
    {
        $this->display->display("Foo, Bar, Baz game. Type up to 10 words to use");
        $this->display->newLine();

        $this->setCurrentWords();

        if($this->invalidInputsCount < self::MAX_INPUT_TRIES){
            $this->fooBarLogic = new FooBarCalculator($this->currentWords);
            $this->display->display("Type a number 1-1000");
            $this->display->newLine();
        }

        $this->setCurrentNumber();

        $this->display->newLine();
        $this->display->display("Too many invalid inputs! Closing the game, sorry :(");
    }

    private function setCurrentWords():void
    {
        while(!isset($this->currentWords)){
            try {
                $this->currentWords = $this->repository->getWords();
            } catch (\Exception $e) {
                $this->display->display($e->getMessage());
                $this->invalidInputsCount++;
            }
            if($this->invalidInputsCount == self::MAX_INPUT_TRIES){
                break;
            }
            $this->display->newLine();
        }
    }

    private function setCurrentNumber():void
    {
        while($this->invalidInputsCount < self::MAX_INPUT_TRIES){
            try {
                $this->currentNumber = $this->repository->getNumber();
                $this->display->display($this->fooBarLogic->evaluate($this->currentNumber));
            } catch (\Exception $e) {
                $this->display->display($e->getMessage());
                $this->invalidInputsCount++;
            } 
            $this->display->newLine();
        }
    }
}