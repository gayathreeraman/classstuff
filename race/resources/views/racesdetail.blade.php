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
            <h3>{{ gmdate('r',$race['startDate'])}}</h3>
            <h3>{{$race['location']}}</h3>
            <h3>{{$race['length']}}</h3>
            <a href ="/races/{{$raceId}}/racers">View Racers</a>
            <a href ="/races/{{$races['raceId']}}/edit">Edit Race</a>
            
                
            </div>
            
        </div>
    </body>
</html>
