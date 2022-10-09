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
                    'smallText' => 'Edit user'
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
                                        <form method="POST" action="{{route('admin.user.update',['id' => $user->id])}}">
                                            @csrf

                                            <div class="form-floating mb-3">
                                                <input class="form-control"
                                                    name="username" type="text" disabled placeholder="Enter your username" value="{{$user->username}}" />
                                                <label for="inputLastName">Username</label>
                                            </div>


                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    name="name" type="text" placeholder="Enter your name" value="{{old('name')??$user->name}}" />
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <label for="inputLastName">Name</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" type="email" value="{{old('email')??$user->email}}"
                                                    placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-5">
                                                <button type="submit" class="btn btn-primary">
                                                    Save
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
