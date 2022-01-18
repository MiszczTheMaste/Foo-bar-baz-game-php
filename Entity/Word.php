<?php
namespace App\Entity;

require_once "required.php";

class Word
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}