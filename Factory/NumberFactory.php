<?php
namespace App\Factory;

require_once "required.php";

use App\Entity\TheNumber;
use App\ValueObject\GameNumber;

class NumberFactory
{
    public static function createNumber($number):TheNumber
    {
        return new TheNumber(new GameNumber($number));
    }
}