@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="card-title text-center fs-2">All Users Information</h1><br>
                    </div>
                </div>

                <div class="card-body">
                    <a href="{{ route('users.create') }}" type="submit" class="btn btn-primary mb-3">Create User</a>

                    <div>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="col">{{ $user->id }}</td>
                                        <td scope="col">{{ $user->name }}</td>
                                        <td scope="col">{{ $user->email }}</td>
                                        <td scope="col">
                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        <td scope="col">
                                            <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-info">show</a>
                                            <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('users.destroy', [$user->id]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
