<table class="">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Tên loại khuyến mãi</th>
            <th><th>
        </tr>
    </thead>
        @if (isset($data))
            @foreach($data as $item)
                <tr ondblclick='edit({{$item->id}})'>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <div class="action">
                            <span onclick='del({{$item->id}})'>Xoá</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
</table>