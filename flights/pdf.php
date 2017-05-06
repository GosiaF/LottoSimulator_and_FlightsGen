<?php
include 'includes/airports.php';
require('vendor/autoload.php');


use NumberToWords\NumberToWords;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['departure']) && isset($_POST['arrival']) && isset($_POST['dateTime']) &&
        isset($_POST['length']) && isset($_POST['price'])) {

        if ($_POST['departure'] === $_POST['arrival']) {
            echo 'Wybierz poprawne lotnisko wylotu i przylotu.';
            die;
        }
        if ($_POST['price'] === 0) {
            echo 'Wprowadź poprawną cenę biletu.';
            die;
        }
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $dateTime = $_POST['dateTime'];
        $length = $_POST['length'];
        $price = $_POST['price'];
        //$airports;
        for ($i = 0; $i < count($airports); $i++) {
            if ($airports[$i]['name'] === $departure) {
                $timeZoneDeparture = new DateTimeZone($airports[$i]['timezone']);
                $codeDeparture = $airports[$i]['code'];
            }
        }
        for ($i = 0; $i < count($airports); $i++) {
            if ($airports[$i]['name'] === $arrival) {
                $timeZoneArrival = new DateTimeZone($airports[$i]['timezone']);
                $codeArrival = $airports[$i]['code'];
            }
        }

        //wylot
        $dateDeparture = new DateTime($dateTime);
        $dateDeparture->setTimezone($timeZoneDeparture);
        $timeDeparture = $dateDeparture->format("d-m-Y H:i:s");

        //przylot
        $dateArrival = new DateTime($datetime);
        $dateArrival->modify('+' . $length . 'hours');
        $dateArrival->setTimezone($timeZoneArrival);
        $timeArrival = $dateArrival->format("d-m-Y H:i:s");

        $faker = Faker\Factory::create();
        $name = $faker->name;

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('pl');
        $priceString = $numberTransformer->toWords($price);


        $mpdf = new mPDF();
        $mpdf->WriteHTML("
    <html>
    <head></head>
    <body>
        <table border='1'>
            <tr>
                <?php
                echo '<td>Imię i nazwisko: $name</td>';
                ?>
            </tr>
            <tr>
                <?php
                echo '<td>Wylot z: $departure, $codeDeparture . o czasie: $timeDeparture.</td>';
                ?>
            </tr>
            <tr>
                <?php
                echo '<td>Przylot do: $arrival, $codeArrival . o czasie: $timeArrival.</td>';
                ?>
            </tr>
            <tr>
                <?php
                echo '<td>Czas lotu: $length godzin.</td>';
                ?>
            </tr>
            <tr>
                <?php
                echo '<td>Cena lotu: $priceString złotych.</td>';
                ?>
            </tr>
        </table>
    </body>
</html>");

        $mpdf->Output('ticket.pdf', 'D');

    } else {
        echo "Błędnie uzupełniony formularz.";
    }
}

