@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Products</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add Product</a>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>€{{ $product->price }}</td>
                                <td>
                                    @if ($product->image1)
                                        <img src="{{ asset('storage/' . $product->image1) }}" alt="{{ $product->name }}" width="50">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.footer')
