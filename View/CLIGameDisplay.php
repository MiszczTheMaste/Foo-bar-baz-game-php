<?php
namespace App\View;

require_once "required.php";

class CLIGameDisplay implements GameDisplay
{
    public function display($value): void
    {
        echo $value;
    }
    
    public function newLine(): void
    {
        echo "\n";
    }
}