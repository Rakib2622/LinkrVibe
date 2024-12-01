@include('admin.partial.header')

@include('admin.partial.sideber')

{{-- Main content --}}
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h1 class="mb-4">Custom Field Details</h1>

            <table class="table table-bordered">
                <tr>
                    <th>Category</th>
                    <td>{{ $customField->category->name }}</td>
                </tr>
                <tr>
                    <th>Field Name</th>
                    <td>{{ $customField->field_name }}</td>
                </tr>
                <tr>
                    <th>Field Type</th>
                    <td>{{ ucfirst($customField->field_type) }}</td>
                </tr>
                <tr>
                    <th>Is Required</th>
                    <td>{{ $customField->is_required ? 'Yes' : 'No' }}</td>
                </tr>
            </table>

            <a href="{{ route('admin.categoryCustomFields.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@include('admin.partial.footer')
