<?php
namespace App\Calculator;

require_once "required.php";

use App\Entity\TheNumber;
use App\Entity\WordCollection;

class FooBarCalculator
{
    private WordCollection $wordCollection;

    public function __construct(WordCollection $wordCollection)
    {   
       $this->wordCollection = $wordCollection; 
    }

    public function evaluate(TheNumber $number): string
    {
        if($this->isEqualOne($number)){
            return $this->wordCollection->getCollection()[0]->getText();
        }
        
        if($this->isPrimeNumber($number)){
            return $this->returnWholeWordCollection();
        }      

        return $this->getOtherWordsItsDivisibleBy($number);
    }

    private function returnWholeWordCollection():string
    {
        $output = "";
        foreach($this->wordCollection->getCollection() as $word){
            $output .= $word->getText();
            $output .= " ";
        }
        return substr($output, 0, -1);
    }

    private function isEqualOne(TheNumber $number): bool
    {
        return $number->getNumber()->equals(1);
    }    
    
    private function isPrimeNumber(TheNumber $number): bool
    {
        for ($i = 2; $i <= $number->getNumber()->divideBy(2); $i++){
            if($number->getNumber()->isDivisibleBy($i)){
                return false;
            }
        }
        return true;
    }

    private function getOtherWordsItsDivisibleBy(TheNumber $number):string
    {
        $output = "";
        for($i = 1; $i < count($this->wordCollection->getCollection()); $i++){
            if($number->getNumber()->isDivisibleBy($i+1)){
                $output .= $this->wordCollection->getCollection()[$i]->getText();
                $output .= " ";
            }
        }
        return substr($output, 0, -1);
    }
}