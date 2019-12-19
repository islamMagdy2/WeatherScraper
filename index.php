<?php
if(array_key_exists("city",$_GET)){
    $cityName= str_replace(" ","",$_GET["city"]);
    $headers = @get_headers("https://www.weather-forecast.com/locations/".$cityName."/forecasts/latest");
    if($headers[0]=="HTTP/1.1 404 Not Found"){
        $result ='<div class="alert alert-danger" id="result" role="alert">Wrong city name ..</div>';
    }
     else{                    
    $forecastPage = file_get_contents("https://www.weather-forecast.com/locations/".$cityName."/forecasts/latest");
    $content = explode('(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',$forecastPage);
    $content2 = explode('.</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9"><span class="b-forecast__table-description-title">',$content[1]);
    $result = '<div class="alert alert-success" id="result" role="alert">'.$content2[0].'</div>';
}
}  
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Live weather</title>
    <style type="text/css">
        html {
            background: url(imgs/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
        }

        .container {
            text-align: center;
            margin-top: 200px;
        }

        h1 {
            color: #fff;
            font-weight: 700;

        }

        p {
            color: #fff;
        }

        #result {
            line-height: 1.5;
            width: 50%;
            margin: 15px auto;
        }

        #cityName {
            width: 50%;
            margin: 50px auto 0;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1> What is the weather? ..</h1>
        <p>Enter the name of the city</p>
        <form>
            <div class="form-group">
                <input type="text" name="city" class="form-control" id="cityName" placeholder="Eg. London, Tokyo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <? 
             echo $result; ?>


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>
        src = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity = "sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin = "anonymous" >

    </script>
</body>

</html>
