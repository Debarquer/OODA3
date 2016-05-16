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
if(isset($_SESSION['page'])){
    switch($_SESSION['page']){
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
        case "about":
            $view->displayGameHouseInfo();
            break;
        case "gameLibrary":
            $var1 = array("name" => "hello1");
            $var2 = array("name" => "hello2");
            $var3 = array("name" => "hello3");
            $var4 = array("name" => "hello1");

            $arr = array($var1, $var2, $var3, $var4, $var1, $var2, $var3, $var4, $var1, $var2, $var3, $var4);
            $view->displayGameLibrary($arr);
            break;
        default:
            break;
    }
} else{
    //case HOME
    $view->displayStart();
}

?>
