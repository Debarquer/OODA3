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
                        echo "<form method='GET'><button type='submit' name='page' value='register'>Register</button></form>";
                        echo "<a href=''>Can't log in?</a>";
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
            <div id="bookings" class="navButton">Bookings</div>
            <script type="text/javascript">
            document.getElementById("bookings").onclick = function () {
                location.href = "?page=bookings";
            };
            </script>
            <div id="calendar" class="navButton">Calendar</div>
            <script type="text/javascript">
            document.getElementById("calendar").onclick = function () {
                location.href = "?page=calendar";
            };
            </script>
            <div id="about" class="navButton">About</div>
            <script type="text/javascript">
            document.getElementById("about").onclick = function () {
                location.href = "?page=about";
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
                ";//<form action='action_page.php'>
                echo
                "<form method=get>
                <fieldset>
                <legend><h1>Booking</h1></legend>
                <br>
                First name<font color='red'>*</font><br>
                <input type='text' name='firstname' required><br>
                <br>
                Last name<font color='red'>*</font><br>
                <input type='text' name='lastname' required><br>
                <br>
                E-mail<font color='red'>*</font><br>
                <input type='text' name='email' required><br>
                <br>
                Phone number<font color='red'>*</font><br>
                <input type='text' name='pnumber' required><br>
                <br>
                Choose game<font color='red'>*</font><br>
                <br>

                <select name='chooseGame' required>
                <option value='Choose game'>Choose game</option>
                <option value='game1'>Fifa 2016</option>
                <option value='game2'>Call of Duty</option>
                <option value='game3'>Battlefield</option>
                <option value='game4'>NihilUmbra</option>
                </select>
                <br>
                <br>

                Date<font color='red'>*</font><br>
                <input type='text' name='date' required><br>
                <br>
                Starting time<font color='red'>*</font><br>
                <input type='text' name='startingTime' required><br>
                <br>
                Amount of hours<font color='red'>*</font><br>
                <input type='text' name='amountOfHours' required><br>
                <br>

                Mentor<br>
                <br>

                <select name='chooseMentor'>
                <option value='mentor'>Choose mentor</option>
                <option value='mentor1'>Charlie Sheen</option>
                <option value='mentor2'>Brad Pitt</option>
                <option value='mentor3'>Michael Jordan</option>
                </select>
                <br>
                <br>

                Booking for<br>
                <br>

                <select name='numberOfPeople'>
                <option value='persons'>1</option>
                <option value='person1'>2</option>
                <option value='person2'>3</option>
                <option value='person3'>4</option>
                </select>
                <br>
                <br>
                <br>
                <br>
                <input type='submit' value='Payment'>
                </fieldset>
                </form>
            </main>";
    }

    //displays the game library as a collection of images
    function displayGameLibrary($data){
        $dir = "resources/games/";

        echo "<div id='gameLibrary'>";

          echo "<table>
                <input class='glButton' type='text' name='search'>
                <input type='submit' value='Search'>";
                for($i = 0; $i < sizeof($data); $i++){
                    echo "<td><a href='?game=" . $data[$i]['game'] . "'><img src='" . $dir . $data[$i]['game'] . "Large.png'></img></a></td>";
                    if(($i+1) % 4 == 0){
                        echo "</tr><tr>";
                    }
                }
                echo "</tr></table>";
        echo "</div>";

    }

    //displays a specific game, its metadata and related reviews
    function displayGame($data){
        echo "
            <main>";
                foreach($data as $arr){
                    foreach($arr as $key => $value){
                        echo "$key : $value <br>";
                    }
                }
            echo "</main>";
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
                Home page
            </main>";
    }

    //displays login form (does not do it now, maybe implement?)
    function displayLogin($loggedIn){
        echo "
            <main>
                Game Library
            </main>";
    }


    function displayCalendar(){
        echo "
            <main>
              Calendar
            </main>";
    }

    function displayMentorShedule($data){
        echo "
            <main>
                Game Library
            </main>";
    }

    function displayGameHouseInfo(){
        echo "
            <main>
                <h2>About</h2>
                Some text about the game house.
            </main>";
    }

    function displayBookings($data){
        echo "<main>";
        echo "<table class='table'><tr><td>Firstname</td><td>Lastname</td><td>Email</td><td>Phone number</td><td>Game</td><td>Date</td><td>Starting time</td><td>Duration (hours)</td><td>Booked mentor</td><td>Amount of participants</td><td>Select</td><td>Update</td></tr>";

        foreach($data as $booking){
          if(isset($_POST['selected'])) {
            if($_POST['selected'] == $booking['pk']) {
              echo "<form method='post' name='updateBookings'>";
              echo "<tr><td><input type='text' name='firstname' value=" . $booking['firstname'] . "></input></td><td><input type='text' name='lastname' value=" . $booking['lastname'] . "></input></td><td><input type='text' name='email' value=" . $booking['email'] . "></input></td><td><input type='text' name='pnumber' value=" . $booking['pnumber'] . "></input></td><td><input type='text' name='game' value=" . $booking['game'] . "></input></td><td><input type='text' name='date' value=" . $booking['date'] . "></input></td><td><input type='text' name='startingTime' value=" . $booking['startingTime'] . "></input></td><td><input type='text' name='amountOfHours' value=" . $booking['amountOfHours'] . "></input></td><td><input type='text' name='mentor' value=" . $booking['mentor'] . "></input></td><td><input type='text' name='amountOfPeople' value=" . $booking['amountOfPeople'] . "></input></td>";
              echo "<td></td>";
              echo "<td><button type='submit' value=" . $booking['pk'] . " name='updateBookings'>update</button></td></tr>";
              echo "</form>";
            } else {
              echo "<tr><td>" . $booking['firstname'] . "</td><td>" . $booking['lastname'] . "</td><td>" . $booking['email'] . "</td><td>" . $booking['pnumber'] . "</td><td>" . $booking['game'] . "</td><td>" . $booking['date'] . "</td><td>" . $booking['startingTime'] . "</td><td>" . $booking['amountOfHours'] . "</td><td>" . $booking['mentor'] . "</td><td>" . $booking['amountOfPeople'] . "</td>";
              echo "<td><form method='post'><button type='submit' value=" . $booking['pk'] . " name='selected'>select</button></form></td>";
              echo "<td></td></tr>";
            }
          } else {
            echo "<tr><td>" . $booking['firstname'] . "</td><td>" . $booking['lastname'] . "</td><td>" . $booking['email'] . "</td><td>" . $booking['pnumber'] . "</td><td>" . $booking['game'] . "</td><td>" . $booking['date'] . "</td><td>" . $booking['startingTime'] . "</td><td>" . $booking['amountOfHours'] . "</td><td>" . $booking['mentor'] . "</td><td>" . $booking['amountOfPeople'] . "</td>";
            echo "<td><form method='post'><button type='submit' value=" . $booking['pk'] . " name='selected'>select</button></form></td>";
            echo "<td></td></tr>";
          }
        }
        echo "</main>";
    }
}
 ?>
