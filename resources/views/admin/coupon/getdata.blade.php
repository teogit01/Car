<table class="">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Mã</th>
            <th>Loại</th>
            <th>Giá tri</th>
            <th>Số lượng: {{$data->count()}}<th>
        </tr>
    </thead>
        @if (isset($data))
            @foreach($data as $index => $item)
                <tr ondblclick='edit({{$item->id}})'>
                    <td>{{$index +1 }}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->value}}</td>
                    <td>
                        <div class="action">
                            <span onclick='del({{$item->id}})'>Xoá</span>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
</table>