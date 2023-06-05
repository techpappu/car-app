<table cellpadding="0" cellspacing="0" class="specification">
    <tbody>
        @if ($carDetails->stock_no)
        <tr>
            <th>STOCK ID</th>
            <td>{{ $carDetails->stock_no }}</td>
        </tr>
        @endif
        @if ($carDetails->model_year)
        <tr>
            <th>Month/Year</th>
            <td>{{ date('m/Y', strtotime($carDetails->model_year)) }}</td>
        </tr>
        @endif
        @if ($carDetails->mileage)
        <tr>
            <th>Mileage</th>
            <td>{{ $carDetails->mileage." ".$carDetails->mileage_type }}</td>
        </tr>
        @endif
        @if ($carDetails->transmission)
        <tr>
            <th>Transmission</th>
            <td>{{ $carDetails->transmission }}</td>
        </tr>
        @endif
        @if ($carDetails->fuel)
        <tr>
            <th>Fuel</th>
            <td>{{ $carDetails->fuel }}</td>
        </tr>
        @endif
        @if ($carDetails->drive_system)
        <tr>
            <th>Drive System</th>
            <td>{{ $carDetails->drive_system }}</td>
        </tr>
        @endif
        @if ($carDetails->bodyStyle)
        <tr>
            <th>Body</th>
            <td>{{ $carDetails->bodyStyle }}</td>
        </tr>
        @endif
        @if ($carDetails->colorName)
        <tr>
            <th>Colors</th>
            <td>{{ $carDetails->colorName }}</td>
        </tr>
        @endif
        @if ($carDetails->repaired)
        <tr>
            <th>Repaired</th>
            <td>{{ $carDetails->repaired }}</td>
        </tr>
        @endif
        @if ($carDetails->steering)
        <tr>
            <th>Steering</th>
            <td>{{ $carDetails->steering }}</td>
        </tr>
        @endif
        @if ($carDetails->doors)
        <tr>
            <th>Doors</th>
            <td>{{ $carDetails->doors }}</td>
        </tr>
        @endif
        @if ($carDetails->displacement)
        <tr>
            <th>Displacement</th>
            <td>{{ $carDetails->displacement }}cc</td>
        </tr>
        @endif
        @if ($carDetails->chassis_no)
        <tr>
            <th>Chassis No</th>
            <td>{{ $carDetails->chassis_no }}</td>
        </tr>
        @endif
        @if ($carDetails->model_code)
        <tr>
            <th>Model Code</th>
            <td>{{ $carDetails->model_code }}</td>
        </tr>
        @endif
        @if ($carDetails->cubic_meter)
        <tr>
            <th>Dimension</th>
            <td>{{ $carDetails->cubic_meter }} m3</td>
        </tr>
        @endif

        @if ($carDetails->seating_capacity)
        <tr>
            <th>Seating Capacity</th>
            <td>{{ $carDetails->seating_capacity }}</td>
        </tr>
        @endif

    </tbody>
</table>
