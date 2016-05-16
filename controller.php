<?php

class Controller{

public function checkInput(){
    if(isset($_GET['page'])){
        $_SESSION['page'] = $_GET['page'];
    } elseif(isset($_GET['game'])){
        $_SESSION['page'] = "game";
        $_SESSION['game'] = $_GET['game'];
    } else{
        $_SESSION['page'] = "HOME";
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
}

function login(){
    //not implemented
}

function logout(){
    //not implemented
}

}

 ?>
