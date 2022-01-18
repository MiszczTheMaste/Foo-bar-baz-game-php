<?php
namespace App\Entity;

require_once "required.php";

use App\ValueObject\GameNumber;

class TheNumber
{
    private GameNumber $number;

    public function __construct(GameNumber $number)
    {
        $this->number = $number;
    }

    public function getNumber():GameNumber
    {
        return $this->number;
    }   
    
    public function setNumber(GameNumber $number):void
    {
        $this->number = $number;
    }


}