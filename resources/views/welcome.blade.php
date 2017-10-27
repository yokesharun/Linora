@extends('layouts.app')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Linora
    </div>
    <h3>Best way to share a link within a milli second.</h3>
    <br>
    <br>
    <a href="{{url('/send')}}" class="btn btn-default btn-lg">Send</a>
    &nbsp; &nbsp; &nbsp;
    <a href="{{url('/receive')}}" class="btn btn-default btn-lg">Receive</a>
</div>
@endsection