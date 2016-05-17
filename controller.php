<?php

class Controller{

public function checkInput($model){
    if(isset($_GET['page'])){
        $_SESSION['page'] = $_GET['page'];
    } elseif(isset($_GET['game'])){
        $_SESSION['page'] = "game";
        $_SESSION['game'] = $_GET['game'];
    } elseif(isset($_GET['firstname']) && isset($_GET['lastname'])){
        echo "***RECEIVED BOOKING***";
        //validate the data in the header
        //to be implemented

        //process the data in the header
        $arr = array("firstname" => $_GET['firstname'], "lastname" => $_GET['lastname'], "email" => $_GET['email'],
        "pnumber" => $_GET['pnumber'], "game" => $_GET['chooseGame'], "date" => $_GET['date'], "startingTime" => $_GET['startingTime'],
        "amountOfHours" => $_GET['amountOfHours'], "mentor" => $_GET['chooseMentor'], "amountOfPeople" => $_GET['numberOfPeople']);

        $model->create("Booking", $arr);
    } else{
        $_SESSION['page'] = "HOME";
    }

    if(isset($_POST['firstname']) && isset($_POST['lastname'])){
        //echo "***RECEIVED BOOKING FOR UPDATE***";
        //update bookings
        $arr = array("pk" => $_POST['updateBookings'], "firstname" => $_POST['firstname'], "lastname" => $_POST['lastname'], "email" => $_POST['email'],
        "pnumber" => $_POST['pnumber'], "game" => $_POST['game'], "date" => $_POST['date'], "startingTime" => $_POST['startingTime'],
        "amountOfHours" => $_POST['amountOfHours'], "mentor" => $_POST['mentor'], "amountOfPeople" => $_POST['amountOfPeople']);

        $model->update("Bookings", $arr);
    }

    if(isset($_POST['username']) && isset($_POST['password'])){

        //Unused system for logging in, should be lifted to at minimum a new function, but it
        //functional given the proper database

        //Uses naive security

        /*$sql = "SELECT * FROM customers";
        $res = $this->conn->query($sql);

        $customers = $res->fetch_all(MYSQLI_ASSOC);
        foreach($customers as $customer){
            if($username == $custmer["username"] && $password == $customer["password"]){*/
                $_SESSION['username'] = $_POST['username'];/*
            }
        }*/
    } elseif (isset($_POST['logout'])) {
        $_SESSION['username'] = "";
    }
    elseif (isset($_POST['payment'])) {
      $view->displayStart();
    }

}

function login(){
    //not implemented
}

function logout(){
    //not implemented
}

}

 ?>
