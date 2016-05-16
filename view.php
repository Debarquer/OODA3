<?php
class InterfaceView{

    //displays header, login, main menu etc not related to specific pages
    public function staticStuff(){

        //HTML meta and header
        echo "
        <!DOCTYPE html>
            <head>
                <title>title</title>
                <link rel='stylesheet' href='style.css'>
            </head>
        <body>

        <header>";

        //Header stuff like name and login/logout/link to register
            echo "LE AWESOME GAME HOUSE";

            $loggedIn = true;

            echo "<div class='login'>";
                if(isset($_SESSION['username'])){
                    if($_SESSION['username'] != ""){
                        echo "Hello " . $_SESSION['username'];
                        echo "<form method='POST'>";
                            echo "<button name='logout' type='submit'>Logout</button>";
                        echo "</form>";
                    } else{
                        $loggedIn = false;
                    }
                } else{
                    $loggedIn = false;
                }

                if(!$loggedIn){
                    echo "<fieldset>";
                        echo "<legend>Login</legend>";

                        echo "<form method='POST'>";
                            echo "Username:";
                            echo "<input name='username' type='text'></input>";
                            echo "Password:";
                            echo "<input name='password' type='password'></input>";
                            echo "<button type='submit'>Login</button>";
                        echo "</form>";
                        echo "<form method='GET'><button type='submit' name='page' value='register'>Register</button></form>'";
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Can't log in?";
                    echo "</fieldset>";
                }

            echo "</div>

            <nav>";

         echo <<<EOT
            <div id="home" class="navButton">Home</div>
            <script type="text/javascript">
            document.getElementById("home").onclick = function () {
                location.href = "?page=home";
            };
            </script>
            <div id="gameLibrary" class="navButton">Game Library</div>
            <script type="text/javascript">
            document.getElementById("gameLibrary").onclick = function () {
                location.href = "?page=gameLibrary";
            };
            </script>
            <div id="booking" class="navButton">Booking</div>
            <script type="text/javascript">
            document.getElementById("booking").onclick = function () {
                location.href = "?page=booking";
            };
            </script>
            <div id="calendar" class="navButton">Calendar</div>
            <script type="text/javascript">
            document.getElementById("calendar").onclick = function () {
                location.href = "?page=calendar";
            };
            </script>
EOT;
                echo "</nav>";

        echo "</header>";
    }

    //displays booking form etc
    function displayBooking(){
        echo "
            <main>
                Booking
            </main>";
    }

    //displays the game library as a collection of images
    function displayGameLibrary($data){
        echo "
            <main>
                Game Library<br>";

                foreach($data as $key => $value){
                    echo "Key: " . $key . " " . "Value : " . $value . "<br>";
                }

            echo "</main>";
    }

    //displays a specific game, its metadata and related reviews
    function displayGame($data){
        echo "
            <main>
                Game Library
            </main>";
    }

    //displays an interace for sending email
    function displayEmail(){
        echo "
            <main>
                Game Library
            </main>";
    }

    //displays interface for generating reports
    function displayReport(){
        echo "
            <main>
                Game Library
            </main>";
    }


    function displayBill(){
        echo "
            <main>
                Game Library
            </main>";
    }

    function displayAccountProfile($data){
        echo "
            <main>
                Game Library
            </main>";
    }

    //displays home page
    function displayStart(){
        echo "
            <main>
                Game Library
            </main>";
    }

    //displays login form (does not do it now, maybe implement?)
    function displayLogin($loggedIn){
        echo "
            <main>
                Game Library
            </main>";
    }


    function displayCalendar($data){
        echo "
            <main>
                Game Library
            </main>";
    }

    function displayMentorShedule($data){
        echo "
            <main>
                Game Library
            </main>";
    }

    function displayGameHouseInfo($data){
        echo "
            <main>
                Game Library
            </main>";
    }
}
 ?>
