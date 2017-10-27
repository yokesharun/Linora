@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Linora - Send
    </div>
    <h3><a href="{{url('/')}}" class="btn btn-lg">< Back</a></h3>

    <br>

    <form class="form-inline">
        <div class="form-group">
            <input type="url" required style="width: 400px;" class="form-control" @if(Request::has('url')) value="{{Request::get('url')}}" @endif placeholder="Enter url" name="url" id="url">
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
@endsection