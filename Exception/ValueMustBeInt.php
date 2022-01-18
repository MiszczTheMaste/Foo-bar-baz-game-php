<?php
namespace App\Exception;

class ValueMustBeInt extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Input must be an int!");
    }
}