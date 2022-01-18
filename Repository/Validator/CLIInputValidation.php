<?php
namespace App\Repository\Validator;

require_once "required.php";

use App\Exception\UserCannotSpecifyMoreThan10Words;
use App\Exception\UserMustSpecifyWords;

class CLIInputValidation
{
    public function validate(array $inputArray):void
    {
        if(empty($inputArray)){
            throw new UserMustSpecifyWords;
        }

        if(count($inputArray) > 10){
            throw new UserCannotSpecifyMoreThan10Words;
        }
    }
}