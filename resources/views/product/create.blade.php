@extends('dashboard')
@section('content')	
<div class="col-md-10">
<div class="cantainer">
<div class="row">
    <div class="card">
        <div class="card-header m-3">
            <h5>Product Create </h5>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('product.index') }}"  class="btn btn-primary">Back</a>
        </div>

        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description"  class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
