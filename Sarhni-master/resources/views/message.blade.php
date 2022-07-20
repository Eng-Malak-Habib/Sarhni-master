@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <img src="{{asset($user->image)}}" alt="{{$user->name}} "style="border-radius: 50%;height: 100px;width: 100px" title="{{$user->name}}">
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="POST" action="{{route('message.store',$user->id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1" style="margin-left: 500px;font-family:Marker Felt, fantasy;color: #fff">Enter your  Message To." ".{{$user->name}}<p style="color: red">&#10084</p> </label>
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 500px; height: 200px ; margin-left: 500px;" placeholder="Be polite"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-left: 550px">Send</button>
    </form>
    <img src="/user-profile/Sarahah_logo_2.png" style="margin-left: 710px">
@endsection
