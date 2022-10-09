@extends('admin.layouts.layouts')

@section('head')
    @include('admin.layouts.head')
@endsection

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                @include('admin.layouts.menuText', [
                    'bigText' => 'User',
                    'smallText' => 'User list',
                ])

                <a href="{{ route('admin.user.create') }}"><button class="btn btn-success mb-5">Add User</button></a>

                <div class="card mb-4">
                    <div class="card-body">
                        @if (\Session::has('error'))
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-danger">
                                    {!! \Session::get('error') !!}
                                </div>
                            </div>
                        @endif
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
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.show', ['id' => $user->id]) }}">
                                                <button class="btn btn-warning"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                            </a>
                                            <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}"
                                                onclick="deleteUser(event)">
                                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
            function deleteUser(e) {
                var result = confirm("Are you sure ?");
                if (!result) {
                    event.preventDefault();
                }
            }
        </script>
    @endsection
