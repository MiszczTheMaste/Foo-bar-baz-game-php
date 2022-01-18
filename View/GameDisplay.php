<?php
namespace App\View;

require_once "required.php";

interface GameDisplay
{
    public function display($value): void;

    public function newLine(): void;
}