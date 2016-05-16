<?php

session_start();

require_once "model.php";
require_once "view.php";
require_once "controller.php";

$model = new Model();
$view = new InterfaceView();
$controller = new Controller();

$controller->checkInput();

$view->staticStuff();
switch("home"){
    case "home":
        $view->displayStart();
        break;
    case "booking":
        $view->displayBooking();
        break;
    case "calendar":
        $view->displayCalendar();
        break;
    case "register":
        //
        break;
    case "gameLibrary":
        $view->displayGameLibrary(array("1" => "Hello1", "2" => "Hello2"));
        break;
    default:
        break;
}

?>
