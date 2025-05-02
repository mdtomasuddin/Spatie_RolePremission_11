@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header m-3">
                        <h5>Role Edit</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                    </div>

                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        {{-- @method('PUT') <!-- ✅ Method Change --> --}}

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $role->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Permissions</label>
                            @foreach ($permissions as $permission)
                                <li>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        id="perm_{{ $permission->id }}"
                                        class="form-check-input me-2"
                                        {{ $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
                                    <label for="perm_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </li>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Update Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
