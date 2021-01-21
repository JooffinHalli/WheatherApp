<?php
error_reporting(E_ERROR | E_PARSE);
$weather = "";
$error = "";
if (isset($_GET['city'])) {
    $content = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=89dc5db9dbfc748ed36fc46b5ebcd7d7');
    $contentArr = json_decode($content, true);
    if ($contentArr['cod'] == 200) {
        $weather = 'The weather in '.$_GET['city'].' is '.$contentArr['weather'][0]['description'].'.';
        $weather = $weather.'<br>'.' The temperature is '.$contentArr['main']['temp'].' &#8451'.'.';
        $weather = $weather.'<br>'.' The speed of wind is '.$contentArr['wind']['speed'].' m/sec'.'.';
    } else {
        $error = "The City name is incorrect, please, try another name";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
    background-image: url("clouds.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}
.container {
    text-align: center;
    margin-top: 10%;
    color: white;
}
.input, .alert {
    width: 40%;
    margin: 10px auto;
}
label, button {
    margin-bottom: 20px;
    margin-top: 20px;
}
    </style>

    <title>Weather App</title>
  </head>
  <body>

    <div class="container">
        <h1>Enter the City name</h1>
        <form>
            <div class="input">
            <label for="form-control">Enter the City</label>
            <input type="text" name="city" class="form-control" placeholder="Enter the City name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if ($weather) {
            echo '<div class="alert alert-primary" role="alert">'.$weather.'</div>';
        } else if ($error) {
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        ?>
        
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>