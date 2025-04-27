@extends('dashboard')
@section('content')	
<div class="col-md-10">
<div class="cantainer">
<div class="row">
    <div class="card">
        <div class="card-header m-3">
            <h1 class="text-center">Product Show  Information</h1>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('product.index') }}"  class="btn btn-primary">Back</a>
        </div>

        <form action="{{ route('product.show',[$product->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Details</label>
                <input type="detail" class="form-control" id="detail" name="detail" value="{{ $product->detail }}" readonly >
            </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
