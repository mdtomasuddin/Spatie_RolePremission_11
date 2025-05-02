@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header m-3">

                        <h5>user Create </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        {{-- role create --}}
                        <div class="mb-3">
                            <label class="form-label">Select Role</label>
                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="radio" name="role" value="{{ $role->id }}"
                                        id="role_{{ $role->id }}" class="form-check-input">
                                    <label class="form-check-label" for="role_{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
