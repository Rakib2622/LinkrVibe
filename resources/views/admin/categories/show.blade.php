@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Category Details</h1>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $category->name }}</h5>
                    <p class="card-text">Description: {{ $category->description }}</p>
                </div>
            </div>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-4">Back to List</a>
        </div>
    </div>
</div>

@include('admin.partial.footer')
