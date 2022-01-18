<?php
//as im not using any framework here i just used this ugly file to do the trick, sorry

require_once "View/GameDisplay.php";
require_once "View/CLIGameDisplay.php";
require_once "ValueObject/GameNumber.php";
require_once "Repository/GameRepository.php";
require_once "Repository/CLIGameRepository.php";
require_once "Repository/validator/CLIInputValidation.php";
require_once "Factory/NumberFactory.php";
require_once "Factory/WordCollectionFactory.php";
require_once "Entity/TheNumber.php";
require_once "Entity/Word.php";
require_once "Entity/WordCollection.php";
require_once "Calculator/FooBarCalculator.php";
require_once "Handler/GameHandler.php";
require_once "Exception/ValueMustBeInt.php";
require_once "Exception/InvalidIntigerRange.php";
require_once "Exception/UserMustSpecifyWords.php";
require_once "Exception/UserCannotSpecifyMoreThan10Words.php";