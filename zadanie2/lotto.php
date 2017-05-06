<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form action="#" method="post" role="form">
                <legend>Wybierz 6 liczb:</legend>
                <div class="form-group">
                    <select name="number1">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="number2">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="number3">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="number4">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="number5">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="number6">
                        <?php
                        for ($i=1; $i<=49; $i++)
                        {
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sprawdź czy wygrałeś</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php

function checkNumbers()
{

    $lottoArr = range(1, 49);

    $lotto = array_rand($lottoArr, 6);

    $numbers = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['number1']) && isset($_POST['number2']) && isset($_POST['number3']) && isset($_POST['number4']) && isset($_POST['number5']) && isset($_POST['number6'])) {

            $numbers [] = $_POST['number1'];
            $numbers [] = $_POST['number2'];
            $numbers [] = $_POST['number3'];
            $numbers [] = $_POST['number4'];
            $numbers [] = $_POST['number5'];
            $numbers [] = $_POST['number6'];

        }
        if (count($numbers) == count(array_unique($numbers))) {
            echo 'Twoje liczby:';

            foreach ($numbers as $key => $value) {
                echo "$value,";


            }
        } else {
            echo 'Wybierz poprawne liczby - pamiętaj, że nie mogą się powtarzać!';
        }
    }



    echo "<br> Wylosowane liczby:";

    foreach ($lotto as $key => $value) {
        echo " $value";
    }

    if (count(array_diff($numbers, $lotto)) > 0) {
        echo '<br> Spróbuj szczęścia raz jeszcze!';
    } else {
        echo 'Gratulacje!';
    }


}




checkNumbers();