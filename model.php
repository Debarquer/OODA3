<?php

class Model{

    public $types = array("games", "accounts", "review", "Game", "GameLibrary");

    //searches for a type using data
    //for a valid type $type
    function search($type, $data){

        if(in_array($types, $type)){

            //valid type, connecting to database
            $conn = new mysqli("localhost", "root", "");
            if($conn->connect_error){
                die("Connection to database failed at create");
            }

            switch($type){
                case game:
                    //searching for a game

                    //'preparing' statement

                    $sql = "SELECT * FROM games LIKE true=true";

                    foreach($data as $key -> $value){
                        switch($key){
                            case title:
                                $sql = " || title=%$value%";
                            break;
                            case descrition:
                                $sql = " || description=%$value%";
                            break;
                            case category:
                                $sql = " || category=%$value%";
                            break;
                            case ageLimit:
                            $sql = " || ageLimit=%$value%";
                            break;
                        }
                    }
                break;
                default:
                break;
            }
        }
    }

    function create($type, $data){
        if(in_array($types, $type)){
            //valid type, connecting to database

            $conn = new mysqli("localhost", "root", "");
            if($conn->connect_error){
                die("Connection to database failed at create");
            }

            switch($type){
                case game:
                    //searching for a game

                    //'preparing' statement
                    $sql = "INSERT INTO $type VALUES ('username', 'displayname', 'password', 'email', 'date', 'type')
                    ('$data[username]', '$data[displayname]', '$data[password]', '$data[email]', '$data[date]', '$data[type]')";

                break;
                default:
                break;
            }
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
                case "GameLibrary":
                    $stmt = $db->prepare("SELECT * FROM GameLibrary");
                    $stmt->execute();
                    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $res;
                default:
                break;
            }
        } else{
            echo "**Invalid type in read**";
        }
    }
    function update($type, $data){
        if(in_array($types, $type)){

            //valid type, connecting to database
            $conn = new mysqli("localhost", "root", "");
            if($conn->connect_error){
                die("Connection to database failed at create");
            }

            switch($type){
                case game:
                break;
                default:
                break;
            }
        }
    }

    function delete($type, $id){
        if(in_array($types, $type)){

            //valid type, connecting to database
            $conn = new mysqli("localhost", "root", "");
            if($conn->connect_error){
                die("Connection to database failed at create");
            }

            switch($type){
                case game:
                break;
                default:
                break;
            }
        }
    }
}

 ?>
