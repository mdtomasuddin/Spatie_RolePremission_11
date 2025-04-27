@extends('dashboard')
@section('content')	
<div class="col-md-10">
<div class="cantainer">
<div class="row">
    <div class="card">
        <div class="card-header m-3">
            <h5>users Information show </h5>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('users.index') }}"  class="btn btn-primary">Back</a>
        </div>

        <form action="{{ route('users.show',[$user->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly >
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
