<?php

session_start();

require_once "model.php";
require_once "view.php";
require_once "controller.php";

if (class_exists('PDO')) {
    //echo "<p>PDO exists and the following PDO drivers are loaded.<pre>";
    //print_r(PDO::getAvailableDrivers());
}

if (in_array("sqlite", PDO::getAvailableDrivers())) {
    //echo "<p style='color:blue'>sqlite PDO driver IS enabled";
} else {
    echo "<p style='color:red'>sqlite PDO driver IS NOT enabled";
}

$model = new Model();
$view = new InterfaceView();
$controller = new Controller();

$controller->checkInput($model);

$view->staticStuff();
if(isset($_SESSION['page'])){
    switch($_SESSION['page']){
        case "home":
            $view->displayStart();
            break;
        case "booking":
            $arr = $model->read("AllGames", null);
            //print_r($arr);
            $view->displayBooking($arr);
            break;
        case "calendar":
            $view->displayCalendar();
            break;
        case "register":
            $view->displayRegister();
            break;
        case "about":
            $view->displayGameHouseInfo();
            break;
        case "gameLibrary":
            if(isset($_POST['search'])){
                $var = $model->search("Game", $_POST['search']);
                $view->displayGameLibrary($var, true);
            } else{
                $var = $model->read("GameLibrary", null);
                $view->displayGameLibrary($var, false);
            }

            break;
        case "game":
            $var = $model->read("Game", $_SESSION['game']);
            $view->displayGame($var, "Name");
            break;
        case "bookings":
            $data = $model->read("Bookings", null);
            $view->displayBookings($data);
        break;
        default:
            $view->displayStart();
            break;
    }
} else{
    //case HOME
    $view->displayStart();
}

?>
