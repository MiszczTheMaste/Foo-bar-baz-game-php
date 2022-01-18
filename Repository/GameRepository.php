<?php
namespace App\Repository;

require_once "required.php";

use App\Entity\TheNumber;
use App\Entity\WordCollection;

interface GameRepository
{
    public function getNumber():TheNumber;

    public function getWords():WordCollection;
}