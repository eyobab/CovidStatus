<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOP Status</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100%;
                margin: 0;
            }


              .homebg {
                  background-image: url("images/background.jpg");
                  background-size: cover;
                  background-color: lightblue;
                  height: 100%;
                  width: 100%

              }
    

            .full-height {
                height: 100%;
            }

             .full-width {
                width: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                height: 100%;
                width: 100%
            }

            .title {
                font-size: 84px;
                margin-top: 150px;

            }

              .status {
                font-size: 36px;
                margin-top: 50px;
                margin-bottom: 30px;
            }

            .links > a {
                color: blue;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <?
        php $route = Route::current(); 
         ?>
                      <div>
                            <li class="nav-item">
                                <a href="{{ route('home','en') }}" class="nav-link">EN</a>
                            </li>
                             <li class="nav-item">
                                <a href="{{ route('home','am') }}" class="nav-link">አማ </a>
                            </li>
                       </div>

        <div class="flex-center position-ref full-height full-width">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login', app()->getLocale()) }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register', app()->getLocale()) }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
          
            <div class="content homebg">
                <div class="title m-b-md " >
                    ሰላም ሚኒስቴር  <br/>
                    Ministry of Peace 
                </div>

                <div class="status">
             
                  የሰራተኞች ወቅታዊ ሁኔታ መከታተያ <br/>
                   Employee Status Tracker  
                </div>

                <div class="normal" >
                 @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login', app()->getLocale()) }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register', app()->getLocale()) }}">Register</a>
                        @endif
                    @endauth
                </div>
              @endif
              </div>  
            </div>
              
        </div>
    </body>
</html>
