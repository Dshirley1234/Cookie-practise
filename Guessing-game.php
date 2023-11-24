<?php

if ( isset($_GET["clear"])) {
    if(isset($_COOKIE["guess-target"])) {
        setcookie("guess-target", "", time() - 100);
        setcookie("user-name" ,   "", time() - 100);
        header("Location: http://localhost/Cookies-practise/Cookie-practise/");
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

if ( ! isset($_COOKIE["guess-target"])) {

    echo "Welcome to the number guessing game!";
    echo "<br>";
    echo "Cookie is not set!";

    $seconds_in_one_day = 60 * 60 * 24;
    setcookie("guess-target", "13" ,   time() + $seconds_in_one_day);
    setcookie("user-name",    "John" , time() + $seconds_in_one_day);
    die();

} else {
    echo "Cookie is set!";
    echo "<br>";
    echo "Value is: " . $_COOKIE["guess-target"];
    echo "<br>";
    echo "<a href='Guessing-game.php?clear=1'>remove cookie</a>";

};
?>

<form name="guess">
     <input type="text" id="guess" name="guess"><br><br>
     <input type="submit" value="Submit">
</form>
</body>
</html>