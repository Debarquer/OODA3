<?php

class Model{

    public $types = array("GameLibrarySearch", "games", "accounts", "review", "Game", "GameLibrary", "Booking", "Bookings", "registerAccount", "deleteBookings", "AllGames");

    //searches for a type using data
    //for a valid type $type
    function search($type, $data){

        if(in_array($type, $this->types)){

            //valid type, connecting to database
            $db = new PDO("sqlite:db/db.sqlite");

            try {
                $db = new PDO("sqlite:db/db.sqlite");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Failed to connect to the database using DSN:<br>$dsn<br>";
                throw $e;
            }

            switch($type){
                case "Game":
                    //searching for a game
                    $stmt = $db->prepare("SELECT * FROM Game WHERE name LIKE '%field%'");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $res;
                break;
                default:
                break;
            }
        }
    }

    function create($type, $data){
        if(in_array($type, $this->types)){
            //valid type, connecting to database
            //echo "***VALID TYPE $type***";

            //valid type, connecting to database
            $db = new PDO("sqlite:db/db.sqlite");

            try {
                $db = new PDO("sqlite:db/db.sqlite");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Failed to connect to the database using DSN:<br>$dsn<br>";
                throw $e;
            }

            switch($type){
                case "Game":
                    //searching for a game

                    //'preparing' statement
                    $sql = "INSERT INTO $type ('username', 'displayname', 'password', 'email', 'date', 'type') VALUES ('$data[username]', '$data[displayname]', '$data[password]', '$data[email]', '$data[date]', '$data[type]')";

                break;
                case "Booking":
                    //echo "***ADDING BOOKING***";
                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $email =$data['email'];
                    $pnumber = $data['pnumber'];
                    $game = $data['game'];
                    $date = $data['date'];
                    $startingTime = $data['startingTime'];
                    $amountOfHours = $data['amountOfHours'];
                    $mentor = $data['mentor'];
                    $amountOfPeople = $data['amountOfPeople'];

                    $stmt = $db->prepare("INSERT INTO Booking ('firstname', 'lastname', 'email', 'pnumber', 'game', 'date', 'startingTime', 'amountOfHours', 'mentor', 'amountOfPeople') VALUES ('$firstname', '$lastname', '$email', '$pnumber', '$game', '$date', '$startingTime', '$amountOfHours', '$mentor', '$amountOfPeople')");
                    $stmt->execute();
                    //$res = $stmt->fetchAll(PDO:FETCH_ASSOC);
                break;
                case "registerAccount":
                $stmt = $db->prepare("INSERT INTO Account ('fullName', 'displayName', 'password', 'email', 'phoneNumber', 'dateOfBirth', 'address', 'username') VALUES ('$data[firstname]', '$data[displayname]', '$data[password]', '$data[email]', '$data[pnumber]', '$data[dateofbirth]', '$data[address]', '$data[username]')");
                $stmt->execute();
                break;
                default:
                break;
            }
        } else{
            echo "***INVALID TYPE $type***";
        }
    }

    function read($type, $id){
        if(in_array($type, $this->types)){

            //valid type, connecting to database
            $db = new PDO("sqlite:db/db.sqlite");

            try {
                $db = new PDO("sqlite:db/db.sqlite");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Failed to connect to the database using DSN:<br>$dsn<br>";
                throw $e;
            }

            switch($type){
                case "Game":
                    $stmt = $db->prepare("SELECT * FROM Game WHERE pk=$id");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $res;
                break;
                case "AllGames":
                    $stmt = $db->prepare("SELECT * FROM Game");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $res;
                break;
                case "GameLibrary":
                    $stmt = $db->prepare("SELECT * FROM GameLibrary");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $res;
                case "Bookings":
                $stmt = $db->prepare("SELECT * FROM Booking");
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $res;
                break;
                default:
                break;
            }
        } else{
            echo "**Invalid type in read**";
        }
    }
    function update($type, $data){
        if(in_array($type, $this->types)){
            //echo "***VALID UPDATE TYPE $type***";
            //valid type, connecting to database
            $db = new PDO("sqlite:db/db.sqlite");

            try {
                $db = new PDO("sqlite:db/db.sqlite");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Failed to connect to the database using DSN:<br>$dsn<br>";
                throw $e;
            }

            switch($type){
                case "Bookings":
                    //echo "***UPDATING BOOKING***";
                    $pk = $data['pk'];
                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $email =$data['email'];
                    $pnumber = $data['pnumber'];
                    $game = $data['game'];
                    $date = $data['date'];
                    $startingTime = $data['startingTime'];
                    $amountOfHours = $data['amountOfHours'];
                    $mentor = $data['mentor'];
                    $amountOfPeople = $data['amountOfPeople'];

                    $stmt = $db->prepare("UPDATE Booking SET firstname = '$firstname', lastname = '$lastname', email = '$email', pnumber = '$pnumber', game = '$game', date = '$date', startingTime = '$startingTime', amountOfHours = '$startingTime', amountOfHours = '$amountOfHours', mentor = '$mentor', amountOfPeople = '$amountOfPeople' WHERE pk=$pk");
                    //$stmt = $db->prepare("UPDATE Booking SET ('firstname' = '$firstname', 'lastname' = '$lastname', 'email' = '$email', 'pnumber' = '$pnumber', 'game' = '$game', 'date' = '$date', 'startingTime' = '$startingTime', 'amountOfHours' = '$amountOfHours', 'mentor' = '$mentor', 'amountOfPeople' = $'amountOfPeople')");
                    $stmt->execute();
                    //$res = $stmt->fetchAll(PDO:FETCH_ASSOC);
                default:
                break;
            }
        } else{
            echo "***INVALID TYPE***";
        }
    }

    function delete($type, $id){
        if(in_array($type, $this->types)){

            //valid type, connecting to database
            $db = new PDO("sqlite:db/db.sqlite");

            try {
                $db = new PDO("sqlite:db/db.sqlite");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Failed to connect to the database using DSN:<br>$dsn<br>";
                throw $e;
            }

            switch($type){
                case "deleteBookings":
                    $stmt = $db->prepare("DELETE FROM Booking WHERE pk = '$id'");
                    $stmt->execute();
                break;
                default:
                break;
            }
        }
    }
}

 ?>
