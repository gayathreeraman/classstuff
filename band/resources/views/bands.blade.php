<!DOCTYPE html>
<html>
    <head>
        <title>Bands</title>

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
                vertical-align: top;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 50px;
                margin:20px;
                padding:20px;

            }
            
            a {
                color:black;
                font-size: 20px;
                padding:10px;
            }
            a:visited{
                color:black;
            }
            .list{

                font-size: 20px;
                font-style: bold;
            }
            .bandimage {
                margin:20px;
            }
            .home{
                font-weight: bold;
                padding:10px;
            }
        </style>
    </head>

    <body>
       
        <div class="container">
            <div class="title"><strong><em>Welcome to Band World</em></strong>
                <div class="content">
            </div>
            <div class="list">
                <div class="bandimage"> 
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQmHXjypPRDah80oJ3-ROXAEMSMzicuHpzjNYynAO6cPWWeOe6X">
                </div>
                <nav>
                    @foreach($bands as $band)
                        <!-- <span><a href="/bands/{{$band['bandId']}}"><strong>{{$band['bandName']}}</strong></a> -->
                        <li><button class="remove" data="{{$band['bandId']}}">X</button><a href="/bands/{{$band[bandId]}}">{{$band["bandName"]}}</a></li>
                       
                    @endforeach
                </nav> 
                <div class="home">
                    <a  href ="/"> Home </a>
                </div>



                <a href="/editor"><button class="add"> + Add a Band</button></a>

                <script src="http://code.jquery.com/jquery-2.14.min.js"></script>
                <script>
                    $(function(){

                        $.ajaxSetup({

                            headers: {

                                'X-CSRF-TOKEN': '{!! csrf_token() !!}'

                            }

                        })

                        var base_url = 'http://localhost:8000/';

                        $("button.remove").on("click",function(e){

                            var bandId = $(this).attr("data");

                            var current =$(this).parent();

                            $.post(base_url + "/api/removeBand",{bandId:bandId},function(res){
                                current.remove();

                                )};


                        });

                    });



                </script>



            </div>  
        </div>
    </body>
</html>
