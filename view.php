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
                <input type='text' name='firstname'><br>
                <br>
                Last name<font color='red'>*</font><br>
                <input type='text' name='lastname'><br>
                <br>
                E-mail<font color='red'>*</font><br>
                <input type='text' name='email'><br>
                <br>
                Phone number<font color='red'>*</font><br>
                <input type='text' name='pnumber'><br>
                <br>
                Choose game<font color='red'>*</font><br>
                <br>

                <select name='chooseGame'>
                <option value='Choose game'>Choose game</option>
                <option value='game1'>Fifa 2016</option>
                <option value='game2'>Call of Duty</option>
                <option value='game3'>Battlefield</option>
                <option value='game4'>NihilUmbra</option>
                </select>
                <br>
                <br>

                Date<font color='red'>*</font><br>
                <input type='text' name='date'><br>
                <br>
                Starting time<font color='red'>*</font><br>
                <input type='text' name='startingTime'><br>
                <br>
                Amount of hours<font color='red'>*</font><br>
                <input type='text' name='amountOfHours'><br>
                <br>

                Mentor<br>
                <br>

                <select name='chooseMentor'>
                <option value='mentor'>Choose mentor</option>
                <option value='mentor1'>Charlie Sheen</option>
                <option value='mentor2'>Brad Pitt</option>
                <option value='mentor3'>Michael Jordan</option>
                <option value='mentor4'>Tarik 'Kungsmarken' Boi</option>
                <option value='mentor5'>None</option>
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
                <form method='GET'><button type='submit' name='page' value='payment'>Payment</button></form>
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
                <h1> Welcome to LE AWESOME GAME HOUSE! </h1>
                <br>

                <h3> Tariks Quote of the day </h3> <br>

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate massa commodo ex finibus, non interdum ligula efficitur. <br> Vestibulum vel ipsum mauris.
                Fusce sed tempor sapien, ac molestie risus. Etiam iaculis augue sed lobortis semper. <br> Proin imperdiet libero non odio laoreet lobortis.
                Aliquam ut convallis nulla, eu congue lectus. <br> Ut sit amet augue a nisl facilisis vulputate. Phasellus non sem urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                <br>
                <br>
                Nunc consectetur non elit at mattis. Ut fermentum pretium sodales. Aliquam malesuada velit in mi porttitor, in rhoncus libero tristique. <br>
                Phasellus volutpat arcu at arcu tincidunt mollis. Phasellus at iaculis leo. Vivamus porttitor sem et feugiat mollis. Praesent in sodales massa. <br>
                Nam fermentum tempus posuere. Donec in ullamcorper justo. Nulla eu risus nisi. Maecenas aliquet ipsum ipsum, eget vulputate sapien efficitur ultrices.
                <br>
                <br>
                Ut vehicula, nibh ut eleifend auctor, lacus quam tempor erat, at eleifend eros tellus sit amet eros. Vivamus sed velit feugiat, posuere nisl non, ultrices libero.
                <br> Donec ultrices ipsum et turpis elementum rhoncus interdum id neque. In rhoncus porta dapibus. Nullam in efficitur justo.
                <br> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras dolor turpis, mollis ut maximus placerat, ornare id nunc.
                <br> Proin dapibus diam id risus interdum facilisis. Phasellus a fermentum augue.
                <br>
                <br>
                Ut vehicula, nibh ut eleifend auctor, lacus quam tempor erat, at eleifend eros tellus sit amet eros. Vivamus sed velit feugiat, posuere nisl non, ultrices libero.
                <br> Donec ultrices ipsum et turpis elementum rhoncus interdum id neque. In rhoncus porta dapibus. Nullam in efficitur justo.
                <br> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras dolor turpis, mollis ut maximus placerat, ornare id nunc.
                <br> Proin dapibus diam id risus interdum facilisis. Phasellus a fermentum augue.
                <br>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate massa commodo ex finibus, non interdum ligula efficitur. <br> Vestibulum vel ipsum mauris.
                Fusce sed tempor sapien, ac molestie risus. Etiam iaculis augue sed lobortis semper. <br> Proin imperdiet libero non odio laoreet lobortis.
                Aliquam ut convallis nulla, eu congue lectus. <br> Ut sit amet augue a nisl facilisis vulputate. Phasellus non sem urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                <br>
                <br>
                Nunc consectetur non elit at mattis. Ut fermentum pretium sodales. Aliquam malesuada velit in mi porttitor, in rhoncus libero tristique. <br>
                Phasellus volutpat arcu at arcu tincidunt mollis. Phasellus at iaculis leo. Vivamus porttitor sem et feugiat mollis. Praesent in sodales massa. <br>
                Nam fermentum tempus posuere. Donec in ullamcorper justo. Nulla eu risus nisi. Maecenas aliquet ipsum ipsum, eget vulputate sapien efficitur ultrices.
                <br>
                <br>
                Nunc consectetur non elit at mattis. Ut fermentum pretium sodales. Aliquam malesuada velit in mi porttitor, in rhoncus libero tristique. <br>
                Phasellus volutpat arcu at arcu tincidunt mollis. Phasellus at iaculis leo. Vivamus porttitor sem et feugiat mollis. Praesent in sodales massa. <br>
                Nam fermentum tempus posuere. Donec in ullamcorper justo. Nulla eu risus nisi. Maecenas aliquet ipsum ipsum, eget vulputate sapien efficitur ultrices.
                <br>
                <br>
                <h3> Newly acquired mentor, Tarik Boi </h3>

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate massa commodo ex finibus, non interdum ligula efficitur. <br> Vestibulum vel ipsum mauris.
                Fusce sed tempor sapien, ac molestie risus. Etiam iaculis augue sed lobortis semper. <br> Proin imperdiet libero non odio laoreet lobortis.
                Aliquam ut convallis nulla, eu congue lectus. <br> Ut sit amet augue a nisl facilisis vulputate. Phasellus non sem urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                <br>
                <br>
                Nunc consectetur non elit at mattis. Ut fermentum pretium sodales. Aliquam malesuada velit in mi porttitor, in rhoncus libero tristique. <br>
                Phasellus volutpat arcu at arcu tincidunt mollis. Phasellus at iaculis leo. Vivamus porttitor sem et feugiat mollis. Praesent in sodales massa. <br>
                Nam fermentum tempus posuere. Donec in ullamcorper justo. Nulla eu risus nisi. Maecenas aliquet ipsum ipsum, eget vulputate sapien efficitur ultrices.
                <br>
                <br>

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
                <h1>About</h1>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate massa commodo ex finibus, non interdum ligula efficitur. <br> Vestibulum vel ipsum mauris.
                Fusce sed tempor sapien, ac molestie risus. Etiam iaculis augue sed lobortis semper. <br> Proin imperdiet libero non odio laoreet lobortis.
                Aliquam ut convallis nulla, eu congue lectus. <br> Ut sit amet augue a nisl facilisis vulputate. Phasellus non sem urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                <br>
                <br>
                Nunc consectetur non elit at mattis. Ut fermentum pretium sodales. Aliquam malesuada velit in mi porttitor, in rhoncus libero tristique. <br>
                Phasellus volutpat arcu at arcu tincidunt mollis. Phasellus at iaculis leo. Vivamus porttitor sem et feugiat mollis. Praesent in sodales massa. <br>
                Nam fermentum tempus posuere. Donec in ullamcorper justo. Nulla eu risus nisi. Maecenas aliquet ipsum ipsum, eget vulputate sapien efficitur ultrices.
                <br>
                <br>
                Ut vehicula, nibh ut eleifend auctor, lacus quam tempor erat, at eleifend eros tellus sit amet eros. Vivamus sed velit feugiat, posuere nisl non, ultrices libero.
                <br> Donec ultrices ipsum et turpis elementum rhoncus interdum id neque. In rhoncus porta dapibus. Nullam in efficitur justo.
                <br> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras dolor turpis, mollis ut maximus placerat, ornare id nunc.
                <br> Proin dapibus diam id risus interdum facilisis. Phasellus a fermentum augue.
                <br>
                <br>
                Ut vehicula, nibh ut eleifend auctor, lacus quam tempor erat, at eleifend eros tellus sit amet eros. Vivamus sed velit feugiat, posuere nisl non, ultrices libero.
                <br> Donec ultrices ipsum et turpis elementum rhoncus interdum id neque. In rhoncus porta dapibus. Nullam in efficitur justo.
                <br> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras dolor turpis, mollis ut maximus placerat, ornare id nunc.
                <br> Proin dapibus diam id risus interdum facilisis. Phasellus a fermentum augue.
                <br>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vulputate massa commodo ex finibus, non interdum ligula efficitur. <br> Vestibulum vel ipsum mauris.
                Fusce sed tempor sapien, ac molestie risus. Etiam iaculis augue sed lobortis semper. <br> Proin imperdiet libero non odio laoreet lobortis.
                Aliquam ut convallis nulla, eu congue lectus. <br> Ut sit amet augue a nisl facilisis vulputate. Phasellus non sem urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                <br>
                <br>
            </main>";
    }
}
 ?>
