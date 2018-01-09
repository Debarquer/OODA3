<?php

class Controller{

public function checkInput($model){
    if(isset($_GET['page'])){
        //echo "***FOUND PAGE " . $_GET['page'];
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

    if(isset($_POST['register'])){
        $arr = array("firstname" => $_POST['firstname'],
                     "lastname" => $_POST['lastname'],
                     "username" => $_POST['username'],
                     "password" => $_POST['password'],
                     "email" => $_POST['email'],
                     "pnumber" => $_POST['pnumber'],
                     "dateofbirth" => $_POST['dateofbirth'],
                     "address" => $_POST['address'],
                     "displayname" => $_POST['displayname']);

        $model->create("registerAccount", $arr);
    } elseif(isset($_POST['deleteBookings'])){
        //deleteing a booking

        echo "***DELETING BOOKING***";

        $model->delete("deleteBookings", $_POST['deleteBookings']);
    } elseif(isset($_POST['firstname']) && isset($_POST['lastname'])){
        //echo "***RECEIVED BOOKING FOR UPDATE***";
        //update bookings
        $arr = array("pk" => $_POST['updateBookings'], "firstname" => $_POST['firstname'], "lastname" => $_POST['lastname'], "email" => $_POST['email'],
        "pnumber" => $_POST['pnumber'], "game" => $_POST['game'], "date" => $_POST['date'], "startingTime" => $_POST['startingTime'],
        "amountOfHours" => $_POST['amountOfHours'], "mentor" => $_POST['mentor'], "amountOfPeople" => $_POST['amountOfPeople']);

        $model->update("Bookings", $arr);
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $this->login($_POST['username'], $_POST['password']);
    } elseif (isset($_POST['logout'])) {
        $_SESSION['username'] = "";
    }
    elseif (isset($_POST['payment'])) {
      $view->displayStart();
    }

}

function login($username, $password){
    //not implemented
    $db = new PDO("sqlite:db/db.sqlite");

    try {
        $db = new PDO("sqlite:db/db.sqlite");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
        throw $e;
    }

    if($username == "" || $password == ""){
        //echo "**EMPTY FIELD**";
        return;
    }

    $stmt = $db->prepare("SELECT * FROM Account WHERE username='$username' AND password='$password'");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($res) > 0){
        //echo "***SUCCESSFULLY VALIDATED as $username and $password***";

        //is logged in
        $_SESSION['username'] = $res[0]['username'];
    } else{
        //echo "***NO SUCH ACCOUNT as $username and $password***";
    }
}

function logout(){
    //not implemented
}

}

 ?>
