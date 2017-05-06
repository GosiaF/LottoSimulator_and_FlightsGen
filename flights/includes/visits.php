<?php
//Ustawienie ciateczek

if (!isset($_COOKIE['visits'])) {
    echo "<h1>Witaj pierwszy raz na stronie!</h1>";
    setcookie('visits', 1, time() + 3600 * 24 * 365);

} else {
    echo "<h1>Odwiedziłeś nas już {$_COOKIE['visits']} razy!</h1>";

    $tmpCookieVal = $_COOKIE['visits'] + 1;
    setcookie('visits', $tmpCookieVal, time() + 3600 * 24 * 365);
}

?>