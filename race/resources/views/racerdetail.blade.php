<!DOCTYPE html>
<html>
    <head>
        <title>Races</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <div><h2>Details about {{$racer['name']}}</h2></div>
            
            <h3>{{$racer['age']}}</h3>
            <h3>{{$racer['racerId']}}</h3>
            <h3>{{$racer['name']}}</h3>
            <a href ="/racers">Back</a>
            <a href ="/racers/{{$racer['racerId']}}/edit">Edit Racer</a>
            
                
            </div>
            
        </div>
    </body>
</html>
