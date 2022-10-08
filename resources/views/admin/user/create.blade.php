@extends('admin.layouts.layouts')

@section('head')
@include('admin.layouts.head')
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @include('admin.layouts.menuText',
                [
                    'bigText'=> 'User',
                    'smallText' => 'Create user'
                ])

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">
                                    <div class="card-body">
                                        @if (\Session::has('error'))
                                            <div class="alert alert-danger">
                                                {!! \Session::get('error') !!}
                                            </div>
                                        @endif
                                        <form method="POST" action="{{route('admin.user.store')}}">
                                            @csrf

                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('username') is-invalid @enderror"
                                                    name="username" type="text" placeholder="Enter your username" value="{{old('username')}}" />
                                                @error('username')
                                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                                @enderror
                                                <label for="inputLastName">Username</label>
                                            </div>


                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    name="name" type="text" placeholder="Enter your name" value="{{old('name')}}" />
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <label for="inputLastName">Name</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" type="email" value="{{old('email')}}"
                                                    placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control @error('password') is-invalid @enderror"
                                                            name="password" id="inputPassword" type="password"
                                                            placeholder="Create a password" />
                                                        @error('password')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-5">
                                                <button type="submit" class="btn btn-primary">
                                                    Create User
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
