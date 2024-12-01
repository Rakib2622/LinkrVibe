@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Category Custom Fields</h1>

            <a href="{{ route('admin.categoryCustomFields.create') }}" class="btn btn-primary mb-4">Add Custom Field</a>

            <!-- Responsive table wrapper -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Field Name</th>
                            <th>Field Type</th>
                            <th>Is Required</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customFields as $field)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $field->category->name }}</td>
                                <td>{{ $field->field_name }}</td>
                                <td>{{ ucfirst($field->field_type) }}</td>
                                <td>{{ $field->is_required ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.categoryCustomFields.show', $field->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.categoryCustomFields.edit', $field->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.categoryCustomFields.destroy', $field->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
