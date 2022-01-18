<?php
namespace App\Exception;

class UserMustSpecifyWords extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct("Must specify at least one word");
    }
}