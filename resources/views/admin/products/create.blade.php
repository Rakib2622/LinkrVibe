@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Add Product</h1>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea name="short_description" id="short_description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="long_description" class="form-label">Long Description</label>
                    <textarea name="long_description" id="long_description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image1" class="form-label">Image 1</label>
                    <input type="file" name="image1" id="image1" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="image2" class="form-label">Image 2</label>
                    <input type="file" name="image2" id="image2" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </div>
</div>

<!-- TinyMCE initialization script -->
<script>
    tinymce.init({
        selector: '#long_description', // Initialize only on the long_description textarea
        plugins: 'lists link image table code', // Plugins for functionality like bullet lists, links, etc.
        toolbar: 'undo redo | styles | bold italic underline | bullist numlist | link image table | code', // Toolbar buttons
        menubar: false, // Disable the menu bar
        branding: false, // Remove branding from the editor
        height: 300, // Set the height of the editor
    });
    
</script>

@include('admin.partial.footer')
