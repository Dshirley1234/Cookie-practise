<?php

if ( isset($_GET["clear"])) {
    if(isset($_COOKIE["guess-target"])) {
        setcookie("guess-target", "", time() - 100);
        setcookie("user-name" ,   "", time() - 100);
        header("Location: http://localhost/Cookies-practise/Cookie-practise/Guessing-game.php");
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $seconds_in_one_day = 60 * 60 * 24;
if ( ! isset($_COOKIE["guess-target"])) {
    $num = rand(0,100);
    echo "Welcome to the number guessing game!";
    echo "<br>";
    echo "Cookie is not set!";


    setcookie("guess-target", $num ,   time() + $seconds_in_one_day);
    setcookie("user-name",    "John" , time() + $seconds_in_one_day);
    die();

} else {

    echo "Cookie is set!";
    echo "<br>";
    echo "Value is: " . $_COOKIE["guess-target"];
    echo "<br>";
    echo "<a href='Guessing-game.php?clear=1'>remove cookie</a>";

    if (isset($_POST["guess"])) {
        if ($_POST["guess"] == $_COOKIE["guess-target"]) {
            echo"<h1>correct<h1>";
            $num = rand(0,100);
            setcookie("guess-target" , $num , time() + $seconds_in_one_day);


        } elseif ($_POST["guess"] <= $_COOKIE["guess-target"]) {
            echo "The target is higher";

        } elseif ($_POST["guess"] >= $_COOKIE["guess-target"]) {
            echo "The target is lower";

        };
    };

};
?>

<form name="guess" method="POST">
     <input type="text" id="guess" name="guess"><br><br>
     <input type="submit" value="Submit">
</form>
</body>
</html>