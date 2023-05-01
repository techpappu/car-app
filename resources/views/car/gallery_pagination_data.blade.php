<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>Image</th>       
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->image }}</td>          
            <td>
                <button type="button" name="edit" id="{{ $row->id }}"
                    class="edit btn btn-primary btn-sm">Edit</button>
                <button type="button" name="delete" id="{{ $row->id }}"
                    class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
