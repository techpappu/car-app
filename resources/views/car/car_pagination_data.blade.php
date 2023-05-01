<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>Car Id</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Title</th>
        <th>Stock No</th>
        <th>Model year</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->brand }}</td>
            <td>{{ $row->model }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ $row->stock_no }}</td>
            <td>{{ $row->model_year }}</td>
            <td>{{ $row->car_location }}</td>
            <td colspan="3">
                <a name="review" class="btn-sm review_button ml-3 review" href="{{url('/admin/car-review?id='. $row->id)}}"
                    style="color: ghostwhite;background-color: green" target="_blank">Review</a>
                <button type="button" name="edit" id="{{ $row->id }}"
                    class="edit btn btn-primary btn-sm">Edit</button>
                <button type="button" name="delete" id="{{ $row->id }}"
                    class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
                <button type="button" name="imgPreview" id="{{ $row->id }}"
                    class="imgPreview btn btn-primary btn-sm">Image Preview</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
