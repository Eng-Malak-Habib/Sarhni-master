@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">your link is {{URL::to('/').'/'.$user->id}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(session()->has('success'))
                                <div class="alert alert-success">
                                {{ session()->get('success') }}
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror "
                           id="name"
                           name="name"
                           placeholder="Enter Name"
                            value="{{$user->name}}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email"
                           class="form-control  @error('email') is-invalid @enderror"
                           id="email" name="email"
                           placeholder="Enter email"  value="{{ $user->email }}" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="bio">bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }} </textarea>
                </div>

                <div class="form-group">
                    <label for="image">Profile image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <img src="{{asset($user->image)}}" alt="{{$user->name}}" width="100" height="100">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="/user-profile/Sarahah_logo_2.png" style="margin-left: 100px; height: 50px ;width: 50px"; >
@endsection


