<?php
namespace App\Repository;

require_once "required.php";

use App\Entity\TheNumber;
use App\Entity\WordCollection;
use App\Factory\NumberFactory;
use App\Factory\WordCollectionFactory;
use App\Repository\Validator\CLIInputValidation;

class CLIGameRepository implements GameRepository
{
    private CLIInputValidation $validator;

    public function __construct()
    {
        $this->validator = new CLIInputValidation();
    }

    public function getNumber():TheNumber
    {
        $rawValue = readline();
        return NumberFactory::createNumber($rawValue);    
    }

    public function getWords():WordCollection
    {
        $rawValue = readline();
        $wordsArray = explode(" ", $rawValue);
        $wordsArray = array_filter($wordsArray);
        $wordsArray = array_values($wordsArray);

        $this->validator->validate($wordsArray);

        return WordCollectionFactory::createCollection($wordsArray);
    }
}