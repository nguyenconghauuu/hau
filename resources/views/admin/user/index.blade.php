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
                    'smallText' => 'User list'
                ])

                <a href="{{route('admin.user.create')}}"><button class="btn btn-success mb-5">Add User</button></a>

                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button class="btn btn-warning"><a href=""><i class="fa-solid fa-pen-to-square"></i></a></button>
                                        <button class="btn btn-danger"><a href=""><i class="fa-solid fa-trash"></i></a></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @endsection
