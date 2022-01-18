<?php
namespace App\Exception;

class UserCannotSpecifyMoreThan10Words extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Must not specify more than 10 words!");
    }
}