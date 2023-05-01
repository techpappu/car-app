<div class="list-cates">
    @foreach ( $rows as $row)
    <ul style="float:left;" class="ulclass">
        <li class="liclass activeInfo">
            {{ $row['name'] }}
        </li>
    </ul>
    @endforeach
</div>