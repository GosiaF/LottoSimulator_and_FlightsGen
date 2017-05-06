<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 2</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        	<form action="hello.php" method="post" role="form">
        		<legend>Your name</legend>
        		<div class="form-group">

        			<input type="text" class="form-control" name="name" id="name" placeholder="Name">
        		</div>

                <button type="submit" class="btn btn-primary" onclick="hello.php">Wyślij</button>
        	</form>
        </div>
    </div>
</div>
</body>
</html>
