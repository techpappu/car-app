<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Phone Country Name</th>
        <th>Phone Country Code</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Is Active?</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->phone_country_name }}</td>
            <td>{{ $row->phone_country_code }}</td>
            <td>{{ $row->address }}</td>
            <td>
                @if ($row->gender == 1)
                    Male
                @elseif ($row->gender == 2)
                    Female
            </td>
    @endif

    <td>{{ $row->is_enabled == 1 ? 'Yes' : 'No' }}</td>
    <td>
        <button type="button" name="edit" id="{{ $row->id }}" class="edit btn btn-primary btn-sm">Edit</button>
        <button type="button" name="delete" id="{{ $row->id }}"
            class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
    </td>
    </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
