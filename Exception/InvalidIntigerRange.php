<?php
namespace App\Exception;

class InvalidIntigerRange extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Input must be in range of 1-1000!");
    }
}