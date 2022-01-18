<?php
namespace App\ValueObject;

require_once "required.php";

use App\Exception\InvalidIntigerRange;
use App\Exception\ValueMustBeInt;

class GameNumber
{
    CONST MIN_VALUE = 1;
    CONST MAX_VALUE = 1000;
    private $value;

    public function __construct($value)
    {
        $this->validation($value);
        $this->value = $value;   
    }

    public function getValue()
    {
        return $this->value;
    }

    private function validation($value): void
    {
        if(!is_numeric($value) && !is_int($value)){
            throw new ValueMustBeInt();
        }

        if($value < self::MIN_VALUE || $value > self::MAX_VALUE){
            throw new InvalidIntigerRange();
        }        
    }

    public function equals($comparedValue): bool
    {
        return $comparedValue == $this->value;
    }

    public function isDivisibleBy($number):bool
    {
        if ($this->value % $number == 0){
            return true;
        } else{
            return false;
        }
    }

    public function divideBy($number):float
    {
        return $this->value/$number;
    }
}