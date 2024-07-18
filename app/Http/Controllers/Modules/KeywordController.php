<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Error;
use Illuminate\Http\Request;

class KeywordController extends Controller
{

    public function index () {

        $model = Keyword::all();

        return view('modules.keyword.index', compact(['model']));

    }


    public function add () {

        return view('modules.keyword.add');

    }


    public function store (Request $request) {

        $request->validate([
            'name' => 'required|min:3|unique:keywords,name',
        ],[
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
            'unique' => ':attribute đã được sử dụng'
        ], [
            'name' => 'Tên'
        ]);

        try {

            $cate = new Keyword();

            $cate->name = $request->name;
            $cate->slug = createSlug($request->name);
            if(!empty($request->active)){
                $cate->active = $request->active;
            }

            $cate->save();

            return redirect()->route('admin.keyword.index')->with('msg', 'Thêm thành công');

        } catch (\Throwable $th) {
            throw $th;
        }

    }


    public function edit (Keyword $item) {

        return view('modules.keyword.edit', compact(['item']));

    }


    public function update (Keyword $item, Request $request) {

        $request->validate([
            'name' => 'required|min:3|unique:keywords,name,'.$item->id,
        ],[
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
            'unique' => ':attribute đã được sử dụng'
        ], [
            'name' => 'Tên'
        ]);

        try {

            $item->name = $request->name;
            $item->slug = createSlug($request->name);
            if(!empty($request->active)){
                $item->active = $request->active;
            }else{
                $item->active = 0;
            }

            $item->save();

            return redirect()->route('admin.keyword.index')->with('msg', 'Sửa thành công');

        } catch (\Throwable $th) {
            throw $th;
        }

    }


    public function delete () {


    }

}
