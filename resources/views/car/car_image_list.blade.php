<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>   
        <th>Position</th>     
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>  
            <td><input type="text" name="position_{{$row->id}}" id="position_{{$row->id}}" value="{{$row->position}}" disabled/></td>         
            <td><img src="{{ asset($row->path) }}" height="300px" width="400px"/></td>
            <td>               
                <button type="button" name="carImageDelete" id="{{ $row->id }}"
                    class="carImageDelete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
                    <button type="button" name="positionEdit" id="{{ $row->id }}"
                        class="btn btn-primary btn-sm carImagePosition carImagePositionId_{{$row->id}}">Edit</button>
                    <button type="button" name="positionUpdate" id="{{ $row->id }}"
                            class="btn btn-primary btn-sm carImagePositionUpdate carImagePositionUpdateId_{{ $row->id}}" style="display: none">Submit</button>
            </td>
        </tr>
    @endforeach
</table>

