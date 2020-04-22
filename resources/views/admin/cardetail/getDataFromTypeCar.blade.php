        
            <table class="">
              <thead class="">
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Biển số</th>
                    <th>Giá</th>
                    <th>Số lượng : {{$data->count()}}</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $index => $item)
                    <tr>
                        <th>{{$index+1}}</th>
                        <td>Ảnh</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->number}}</td>
                        <td>{{$item->rental}}</td>
                        <td>
                            <div class="action">
                              <span onclick='del({{$item->id}})'>Xoá</span>
                            </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>    
        