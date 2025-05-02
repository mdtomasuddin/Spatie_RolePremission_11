@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="card-title text-center fs-2">All Roles Information</h1><br>
                    </div>
                </div>

                <div class="card-body">
                    {{-- @can('role.create') --}}
                        <a href="{{ route('roles.create') }}" type="submit" class="btn btn-primary mb-3">Create Roles</a>
                    {{-- @endcan --}}
                    <div>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Permissions</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td scope="col">{{ $role->id }}</td>
                                        <td scope="col">{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge bg-success">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td scope="col">
                                            @can('product.view')
                                                <a href="{{ route('roles.show', [$role->id]) }}" class="btn btn-info">show</a>
                                            @endcan
                                            @can('role.edit')
                                                <a href="{{ route('roles.edit', [$role->id]) }}"
                                                    class="btn btn-primary">Edit</a>
                                            @endcan

                                            @can('role.delete')
                                                <a href="{{ route('roles.destroy', [$role->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            @endcan
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
