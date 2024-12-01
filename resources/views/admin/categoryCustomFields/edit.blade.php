@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Edit Custom Field</h1>

            <form action="{{ route('admin.categoryCustomFields.update', $customField->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $customField->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="field_name" class="form-label">Field Name</label>
                    <input type="text" name="field_name" id="field_name" class="form-control" value="{{ $customField->field_name }}" required>
                </div>

                <div class="mb-3">
                    <label for="field_type" class="form-label">Field Type</label>
                    <select name="field_type" id="field_type" class="form-select" required>
                        <option value="text" {{ $customField->field_type == 'text' ? 'selected' : '' }}>Text</option>
                        <option value="image" {{ $customField->field_type == 'image' ? 'selected' : '' }}>Image</option>
                        <option value="url" {{ $customField->field_type == 'url' ? 'selected' : '' }}>URL</option>
                        <option value="boolean" {{ $customField->field_type == 'boolean' ? 'selected' : '' }}>Boolean</option>
                    </select>
                </div>
                

                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_required" id="is_required" class="form-check-input" {{ $customField->is_required ? 'checked' : '' }}>
                    <label for="is_required" class="form-check-label">Is Required</label>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@include('admin.partial.footer')
