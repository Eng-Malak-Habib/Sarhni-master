@extends('layouts.app')

@section('content')
    <script>
        alert('to open your profile drop-down the menu above')
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Hello'.' '.$user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in successfully') }}
                </div>

            </div>
            <img src="{{asset($user->image)}}" class="rounded-circle" alt="" style="margin-left: 310px; height: 100px ;width: 100px">
        </div>
    </div>

</div>
<h1 style="text-align: center;font-family: 'Times New Roman', serif;">BIO</h1>
<h3 style="text-align: center;font-family:Marker Felt, fantasy">{{$user->bio}}</h3>
<img src="/user-profile/Sarahah_logo_2.png" style="margin-left: 800px">
@endsection
