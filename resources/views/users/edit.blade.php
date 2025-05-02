@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header m-3">

                        <h5>user edit </h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>

                    <form action="{{ route('users.update', [$user->id]) }}" method="POST">
                        @csrf
                        {{-- @method('putch') --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Select Role</label>

                            @if ($user->roles->isEmpty())
                                <p class="text-danger">No role assigned to this user.</p>
                            @endif

                            @foreach ($roles as $role)
                                <div class="form-check">
                                    <input type="radio" name="role" value="{{ $role->id }}"
                                        id="role_{{ $role->id }}" class="form-check-input"
                                        {{ !$user->roles->isEmpty() && $user->roles->first()->id == $role->id ? 'checked' : '' }}>
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
