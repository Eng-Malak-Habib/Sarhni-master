@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="all-messages">
        <h1 style="color: white">number of visits: ({{Auth::User()->visits}})</h1>
        <h1 style="color: white"> your messages
            <p style="color: blue">
                &#11015;</p> </h1>

        @forelse($messages as $message)
    <div class="box shadow">
        <p>{{$message->content}}</p>
        <div class="control">
            <p class="time" style="color: red">sent at {{$message->created_at}}</p>
        </div>
    </div>
        @empty
        <div class="box shadow">
            <p>لا توجد رسائل حتي الان</p>
        </div>

        @endforelse
</div>
</div>
</div>


@endsection
