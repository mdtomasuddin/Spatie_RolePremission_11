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
            <a href="{{ route('product.index') }}"  class="btn btn-primary">Back</a>
        </div>

        <form action="{{ route('product.update',[$product->id]) }}" method="POST">
            @csrf
            {{-- @method('putch') --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Details</label>
                <input type="detail" class="form-control" id="detail" name="detail" value="{{ $product->detail }}" required>
            </div>
         
            <button type="submit" class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection
