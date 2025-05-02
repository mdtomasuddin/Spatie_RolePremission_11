@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header m-3">

                        <h5>Role Create </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                    </div>

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Permission</label>

                            @foreach ($permissions as $permission)
                                <li>
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        id="perm_{{ $permission->id }}" class="form-check-input">
                                    <label for="perm_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </li>
                            @endforeach

                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
