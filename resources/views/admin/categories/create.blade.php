@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Create Category</h1>

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">How to order</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Enter How to order"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Category</button>
            </form>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#description', // Initialize only on the long_description textarea
        plugins: 'lists link image table code', // Plugins for functionality like bullet lists, links, etc.
        toolbar: 'undo redo | styles | bold italic underline | bullist numlist | link image table | code', // Toolbar buttons
        menubar: false, // Disable the menu bar
        branding: false, // Remove branding from the editor
        height: 300, // Set the height of the editor
    });
    
</script>

@include('admin.partial.footer')
