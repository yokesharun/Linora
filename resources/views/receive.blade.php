@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Linora - Receive
    </div>
    <h3><a href="{{url('/')}}" class="btn btn-lg">< Back</a></h3>

    <div id="qr_code">
        {!! QrCode::size(250)->generate($code); !!}

        <p>Note : Scan this QR code in your Linora Android App</p>
    </div>

    <div id="result">
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    (function worker() {
        $.get('/show',{ code : "{{$code}}" }, function(data) {
            if(data.status == 'USED' && data.value != ''){
                $('#qr_code').fadeOut(100);

                re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;

                if (!re.test(data.value)) {
                    $('#result').html(data.value);
                } else {
                    $('#result').html('<a href="'+data.value+'" target="_blank">'+data.value+'</a>').fadeIn(200);
                    $('#result a')[0].click();
                }
            } else {
                var timer = setTimeout(worker, 1000);
            }
        });
    })();
</script>
@endsection