<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);

        if (strlen($name) > 1) {

            echo 'Cześć, ' . $name . '!';

        } else {

            echo 'Podaj swoję imię.';
        }
    }
}

