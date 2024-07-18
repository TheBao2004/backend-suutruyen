<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use Error;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{

    public function index () {

        $model = Category::model();

        // $arr = [];

        // foreach (Category::all() as $key => $value) {
        //     $arr[] = 'danh-muc-'.$value->id;
        // }

        // echo json_encode($arr);

        // echo '<br>';

        // $arr = [];

        // foreach (Keyword::all() as $key => $value) {
        //     $arr[] = 'tu-khoa-'.$value->id;
        // }

        // echo json_encode($arr);

        // echo '<pre>';
        // print_r($arr);
        // echo '</pre>';

        // exit;

        return view('modules.category.index', compact(['model']));

    }


    public function add () {

        $categories = Category::all();

        return view('modules.category.add', compact(['categories']));

    }

    public function store (Request $request) {

        $request->validate([
            'name' => 'required|min:3|unique:categories,name',
        ],[
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
            'unique' => ':attribute đã được sử dụng'
        ], [
            'name' => 'Tên'
        ]);

        try {

            $cate = new Category();

            $cate->name = $request->name;
            $cate->slug = createSlug($request->name);
            if(!empty($request->active)){
                $cate->active = $request->active;
            }
            $cate->cate_id = $request->cate_id;

            $cate->save();

            return redirect()->route('admin.category.index')->with('msg', 'Thêm thành công')->with('type', 'success');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function edit (Category $item) {

        $categories = Category::all();

        return view('modules.category.edit', compact(['item', 'categories']));

    }

    public function update (Category $item, Request $request) {

        $request->validate([
            'name' => 'required|min:3|unique:categories,name,'.$item->id,
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
            $item->cate_id = $request->cate_id;

            $item->save();

            return redirect()->route('admin.category.index')->with('msg', 'Sửa thành công');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function delete (Category $item) {



    }


}
