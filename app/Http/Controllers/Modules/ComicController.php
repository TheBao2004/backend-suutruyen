<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class ComicController extends Controller
{


    public function index () {

        $model = Comic::all();

        return view('modules.comic.index', compact(['model']));

    }


    public function add () {


        $categories = Category::all();
        $keywords = Keyword::all();

        return view('modules.comic.add', compact(['categories', 'keywords']));

    }


    public function store (Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|unique:comics,name',
                'categories.*' => 'required',
                'keyworks.*' => 'required',
                'thumbnail' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'description' => 'required'
            ], [
                'required' => ':attribute bắt buộc phải nhập',
                'thumbnail.required' => ':attribute bắt buộc phải chọn',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'unique' => ':attribute đã được sử dụng',
                'file' => 'File bạn chọn không hợp lệ.',
                'mimes' => 'File phải là định dạng jpeg, png, jpg hoặc gif.',
                'thumbnail.max' => 'File quá lớn, vui lòng chọn file có kích thước nhỏ hơn 2MB.',
            ], [
                'name' => 'Tên',
                'categories.*' => 'Danh mục',
                'keyworks.*' => 'Từ khóa',
                'thumbnail' => 'Thumbnail',
                'description' => 'Mô tả ngắn'
            ]
        );

        $errors = $validator->errors()->messages();

        if(empty($request->categories)){
            $errors['categories'] = [
                'Danh mục bắt buộc phải chọn'
            ];
        }

        if(empty($request->keywords)){
            $errors['keywords'] = [
                'Từ khóa bắt buộc phải chọn'
            ];
        }



        if ($validator->fails()) return back()->withErrors($errors)->withInput();

        $file = $request->thumbnail;
        $fileName = rand(10000000, 99999999) . '_' . $file->getClientOriginalName();
        $file->storeAs('public/uploads', $fileName);

        $comic = new Comic();

        $comic->name = $request->name;
        $comic->slug = createSlug($request->name);
        if(!empty($request->active)){
            $comic->active = $request->active;
        }
        $comic->description = $request->description;
        $comic->book = $request->book;
        $comic->status = $request->status;
        $comic->thumbnail = $fileName;
        $comic->categories = json_encode($request->categories);
        $comic->keywords = json_encode($request->keywords);

        $comic->save();

        return redirect()->route('admin.comic.index')->with('msg', 'Thêm truyện thành công');

    }


    public function edit (Comic $item) {

        $categories = Category::all();
        $keywords = Keyword::all();

        return view('modules.comic.edit', compact(['categories', 'keywords', 'item']));

    }


    public function update (Comic $item, Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|unique:comics,name,'.$item->id,
                'categories.*' => 'required',
                'keyworks.*' => 'required',
                'thumbnail' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
                'description' => 'required'
            ], [
                'required' => ':attribute bắt buộc phải nhập',
                'thumbnail.required' => ':attribute bắt buộc phải chọn',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'unique' => ':attribute đã được sử dụng',
                'file' => 'File bạn chọn không hợp lệ.',
                'mimes' => 'File phải là định dạng jpeg, png, jpg hoặc gif.',
                'thumbnail.max' => 'File quá lớn, vui lòng chọn file có kích thước nhỏ hơn 2MB.',
            ], [
                'name' => 'Tên',
                'categories.*' => 'Danh mục',
                'keyworks.*' => 'Từ khóa',
                'thumbnail' => 'Thumbnail',
                'description' => 'Mô tả ngắn'
            ]
        );

        $errors = $validator->errors()->messages();

        if(empty($request->categories)){
            $errors['categories'] = [
                'Danh mục bắt buộc phải chọn'
            ];
        }

        if(empty($request->keywords)){
            $errors['keywords'] = [
                'Từ khóa bắt buộc phải chọn'
            ];
        }

        if ($validator->fails()) return back()->withErrors($errors)->withInput();

        $file = $request->thumbnail;
        if(!empty($file)){
            $fileName = rand(10000000, 99999999) . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $fileName);
            // if(Storage::exists('public/uploads/'.$item->thumbnail)){
            //     Storage::delete('public/uploads/'.$item->thumbnail);
            // }
            $item->thumbnail = $fileName;
        }

        $item->name = $request->name;
        $item->slug = createSlug($request->name);
        if(!empty($request->active)){
            $item->active = $request->active;
        }else{
            $item->active = 0;
        }
        $item->description = $request->description;
        $item->book = $request->book;
        $item->status = $request->status;
        $item->categories = json_encode($request->categories);
        $item->keywords = json_encode($request->keywords);

        $item->save();

        return redirect()->route('admin.comic.edit', ['item' => $item])->with('msg', 'Sửa truyện thành công');

    }


    public function delete () {



    }


}
