<?php
namespace App;

require_once "required.php";

use App\Handler\GameHandler;
use App\Repository\CLIGameRepository;
use App\View\CLIGameDisplay;

//lets say this class is something like controller
//passing new instances here in case i wanted to use different repository or display method, for example for http
$game = new GameHandler(new CLIGameRepository(), new CLIGameDisplay);

$game->play();
?>