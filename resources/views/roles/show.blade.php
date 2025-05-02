@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header m-3">
                        <h4>Role Show  Details</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                    </div>

                    <div class="mb-3">
                        <strong>Name:</strong> {{ $role->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Permissions:</strong><br>
                        @if($role->permissions->count() > 0)
                            @foreach($role->permissions as $permission)
                                <span class="badge bg-success">{{ $permission->name }}</span>
                            @endforeach
                        @else
                            <p>No permissions assigned to this role.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
