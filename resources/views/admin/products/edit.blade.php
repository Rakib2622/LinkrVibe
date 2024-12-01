@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Edit Product</h1>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" value="{{ $product->color }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea name="short_description" id="short_description" class="form-control">{{ $product->short_description }}</textarea>
                </div>

                {{-- <div class="mb-3">
                    <label for="long_description" class="form-label">Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control">{{ $product->long_description }}</textarea>
                </div> --}}

                <div class="mb-3">
                    <label for="long_description" class="form-label">Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control">{{ old('long_description', $product->long_description ?? '') }}</textarea>
                </div>
                

                <div class="mb-3">
                    <label for="image1" class="form-label">Image 1</label>
                    <input type="file" name="image1" id="image1" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image2" class="form-label">Image 2</label>
                    <input type="file" name="image2" id="image2" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>


<script>
    tinymce.init({
        selector: '#long_description', // Target the textarea by ID
        plugins: 'lists link image table code',
        toolbar: 'undo redo | styles | bold italic underline | bullist numlist outdent indent | link image table | code',
        menubar: false,
        height: 300, // Set the height of the editor
        branding: false, // Remove TinyMCE branding
    });
</script>


@include('admin.partial.footer')
