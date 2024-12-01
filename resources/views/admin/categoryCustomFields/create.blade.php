@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Add Custom Field</h1>

            <form action="{{ route('admin.categoryCustomFields.store') }}" method="POST">
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
                    <label for="field_name" class="form-label">Field Name</label>
                    <input type="text" name="field_name" id="field_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="field_type" class="form-label">Field Type</label>
                    <select name="field_type" id="field_type" class="form-select" required>
                        <option value="text">Text</option>
                        <option value="image">Image</option>
                        <option value="url">URL</option>
                        <option value="boolean">Boolean</option>
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_required" id="is_required" class="form-check-input">
                    <label for="is_required" class="form-check-label">Is Required</label>
                </div>
                

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
