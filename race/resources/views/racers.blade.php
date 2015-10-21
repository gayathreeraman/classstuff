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
                
                    <div class="title">Welcome to Racers</div>
                    <ul>
                        @foreach($racers as $racer)
                        <li><form action="/racers/{{$racer['racerId']}}/delete" method="POST">{{ csrf_field() }}
                        <button>x</button>
                        <a href="/racers/{{$racer['racerId']}}">{{$racer['name']}}</a></form></li>
                        @endforeach
                    </ul>  
            </div>

            <a href="/racereditor">Add Racer</a>
        </div>
    </body>
</html>
