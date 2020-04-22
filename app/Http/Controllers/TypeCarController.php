<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeCarController extends Controller
{
    // public function getAdd(){
    // 	return view('admin.typeCar.getAdd');
    // }
    // public function postAdd (Request $request) {
    //     $this->validate($request,
    //     [
    //         'name' => 'required|min:4|max:30|unique:car_models, car_model_name',
    //         'model' => 'required|min:4|max:30|unique'

    //     ],
    //     [
    //         'name.required'=>'Bạn chưa nhập tên',
    //         'name.unique'=>'Tên đã tồn tại',
    //         'name.min'=>'Phải có ít nhất 4 ký tự',
    //         'name.max'=>'Độ dài không quá 30 ký tự',
    //         'model.required'=>'Bạn chưa nhập model',
    //         'model.unique'=>'Model đã tồn tại',
    //         'model.min'=>'Phải có ít nhất 4 ký tự',
    //         'model.max'=>'Độ dài không quá 30 ký tự'
            
    //     ]);

    //     $car_models = new car_models;
    //     $car_models->car_model_name = $request->name;
    //     $car_models->model = $request->model;
    //     $car_models->seating = $request->seating;
    //     $loai_ban->save();

    //     return redirect('admin/table_type/add')->with('thongbao','Thêm thành công');
    // }
    // public function getUpdate ($id) {
    //     $khu_vuc = khu_vuc::all();
    //     $loai_ban = loai_ban::find($id);
    //     return view('admin.table_type.update', ['loai_ban' => $loai_ban, 'khu_vuc' => $khu_vuc]);
    // }
    // public function postUpdate (Request $request, $id) {
    //     $this->validate($request,
    //     [
    //         'Ten' => 'required|min:4|max:30|unique:loai_ban,ten_loai_ban',
    //         'KhuVuc' => 'required'
    //     ],
    //     [
    //         'Ten.required'=>'Bạn chưa nhập tên',
    //         'Ten.unique'=>'Tên loại bàn đã tồn tại',
    //         'Ten.min'=>'Phải có ít nhất 4 ký tự',
    //         'Ten.max'=>'Độ dài không quá 30 ký tự',
    //         'KhuVuc.required'=>'Bạn chưa chọn tên khu vực'
    //     ]);
    //     $loai_ban = loai_ban::find($id);
    //     $loai_ban->ten_loai_ban = $request->Ten;
    //     $loai_ban->id_khu_vuc = $request->KhuVuc;
    //     $loai_ban->save();

    //     return redirect('admin/table_type/update/'.$id)->with('thongbao','Cập nhật thành công');
    // }

    // public function getDelete ($id) {
    //     $loai_ban = loai_ban::find($id);
    //     $loai_ban->delete();

    //     return redirect('admin/table_type/table_type')->with('thongbao','Xóa thành công');
    // }
}
