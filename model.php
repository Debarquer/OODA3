<?php

class Model{

    public $types = array("games", "accounts", "review");

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
        if(in_array($types, $type)){

            //valid type, connecting to database
            $conn = new mysqli("localhost", "root", "");
            if($conn->connect_error){
                die("Connection to database failed at create");
            }

            switch($type){
                case game:
                break;
                case accounts:
                    $sql = "SELECT * FROM accounts WHERE pk='$id'";
                    $result = mysqli_query($conn, $sql);
                    $arr = array();
                    while($row = $result->fetch_assoc()){
                        $arr[] = $row;
                    }

                    $conn->close();
                    return $arr;

                default:
                break;
            }
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
