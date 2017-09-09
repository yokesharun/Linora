<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Linora - Send</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Linora - Send
                </div>
                <h3><a href="{{url('/')}}" class="btn btn-lg">< Back</a></h3>

                <br>

                <form class="form-inline">
                  <div class="form-group">
                    <input type="url" required style="width: 400px" class="form-control" @if(Request::has('url')) value="{{Request::get('url')}}" @endif placeholder="Enter url" name="url" id="url">
                  </div>
                  <button type="submit" class="btn btn-default">Send</button>
                </form>

                @if(Request::has('url'))
                    @if(Request::get('url') != '')
                        <div id="qr_code">
                            {!! QrCode::size(250)->generate(Request::get('url')); !!}
                        </div>
                        <p>Note : Scan this QR code in your Linora Android App</p>
                    @endif
                @endif


            </div>
        </div>
    </body>
</html>
