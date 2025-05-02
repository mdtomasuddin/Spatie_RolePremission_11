@extends('dashboard')
@section('content')
    <div class="col-md-10">
        <div class="cantainer">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="card-title text-center fs-2">All Product Information</h1><br>
                    </div>
                </div>

                <div class="card-body">
                    @can('product.create')
                        <a href="{{ route('product.create') }}" type="submit" class="btn btn-primary mb-3">Create product</a>
                    @endcan
                    <div>
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td scope="col">{{ $product->id }}</td>
                                        <td scope="col">{{ $product->name }}</td>
                                        <td scope="col">{{ $product->detail }}</td>
                                        <td scope="col">
                                            @can('product.view')
                                                <a href="{{ route('product.show', [$product->id]) }}"
                                                    class="btn btn-info">show</a>
                                            @endcan
                                            @can('product.edit')
                                                <a href="{{ route('product.edit', [$product->id]) }}"
                                                    class="btn btn-primary">Edit</a>
                                            @endcan
                                            @can('product.delete')
                                                <a href="{{ route('product.destroy', [$product->id]) }}"
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
