<table class="">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Tên dịch vụ</th>
            <th>Giá</th>
            <th></th>
        </tr>
    </thead>
        @if (isset($data))
            @foreach($data as $item)
                <tr ondblclick='edit({{$item->id}})'>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <div class="action">
                            <span onclick='del({{$item->id}})'>Xoá</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
</table>