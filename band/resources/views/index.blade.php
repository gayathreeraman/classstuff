<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

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
                /*background-image:url("https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTVa9U5qjKWcUmbtVAez1oU17r0lwvLNnfBFrp-bn0MGL2RXZZPjQ");*/
                background-color: #EE792E;

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
                font-size: 60px;
            }
            a {
                color:black;
                font-size: 20px;
                padding:10px;
            }
            a:visited{
                color:black;
            }
            nav{
               
                margin:10px;

            }
            img{
                box-shadow: 10px;
            }
        </style>
    </head>
    <body>

        <div class="container">
                    <div class="title"><strong><em>Welcome to Music world</em></strong></div>
            <div class="content">
                
            </div>
            <div> 
                <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSwbO807iofYPvUlEQYH_oVsCE2ti8jgCWDpFjXyg4Hkq1IuPduA">
            </div>
            <nav>
                <a href ="/"><strong>Home</strong></a>
                <a href ="/bands"><strong>Band</strong></a>
                <a href ="/instrument"><strong>Instrument</strong></a>
            </nav>
        </div>
    </body>
</html>
