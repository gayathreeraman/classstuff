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
                font-size: 45px;
                padding-bottom: 10px;
            }
            .bandinfo{
                color:black;
                font-size: 20px;
                font-weight: 700;
                padding:5px;
            }
            
            .home{
                font-weight: bold;
                padding:10px;
                color:black;
                font-size: 20px;
            }
            a:visited{
                color:black;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><strong><em>Welcome to {{$band123['bandName']}} Land</em></strong></div>
            </div>
         
            <div>
                <img src= "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRib56IMiNV88-rszIXwTiDk_TNRevSLtsWtSSO_m_AQCQG0pqT">;
             </div>
                   
            <div class = "bandinfo">Location: {{$band123['location']}}</div>
            
            
            <div class = "bandinfo"> Start Date:{{$band123['startDate']}}</div>
                   <!-- <h3> {{$band123['isActive']}} </h3> -->

                   <!-- <h3><a href ="/bands/{{'bands{bandId}'}}/bandinstrument">Instrument</a></h3> -->
            <div class = "bandinfo"><a href ="/bands/{{$band123['bandId']}}/bandinstrument">Instrument</a></div>
              
             
           <div class="home">
             <a  href ="/"> Home </a>
            </div>
        
        </div>
    </body>
</html>
