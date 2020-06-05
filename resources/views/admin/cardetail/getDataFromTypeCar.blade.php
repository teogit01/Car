        
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
                    <tr ondblclick='detail({{$item->id}})'>
                        <th>{{$index+1}}</th>
                        <td>Ảnh</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->number}}</td>
                        <td>{{$item->rental}}</td>
                        <td>
                         <div class="action">
                          <span class="del" onclick='detail({{$item->id}})'><i class="fa fa-pencil text-inverse m-r-10 fa-lg"></i></span>
                          &nbsp;&nbsp;&nbsp;
                          <span class="del" onclick='del({{$item->id}})'><i class="fal fa-trash-alt fa-lg"></i></span>

                        </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>    
           
        