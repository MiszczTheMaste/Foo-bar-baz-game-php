<?php
namespace App\Factory;

require_once "required.php";

use App\Entity\Word;
use App\Entity\WordCollection;

class WordCollectionFactory
{
    public static function createCollection(array $wordsArray):WordCollection
    {
        return new WordCollection(
            array_map(
                function (string $row) {
                    return new Word($row);
                },
                $wordsArray
            )
        );
    }
}