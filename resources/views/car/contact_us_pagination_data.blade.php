<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>User Name</th>
        <th>Company Name</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Comment</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->user_name }}</td>
            <td>{{ $row->company_name }}</td>
            <td>{{ $row->country }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->comment }}</td>
            <td>
                <button type="button" name="reply" id="{{ $row->id }}" class="reply btn btn-primary btn-sm">Mail
                    Reply</button>
                <button type="button" name="delete" id="{{ $row->id }}"
                    class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
