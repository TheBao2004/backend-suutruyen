<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    private function storage($path = "")
    {

        $storage = "public";

        if (!empty($path)) {
            $storage = $storage . '/' . $path;
        }

        return $storage;
    }

    public function index($path = "")
    {

        // $files = Storage::allFiles('public');

        // $files = array_map(function ($item) {
        //     if (!str_contains($item, '.gitignore')) return $item;
        // }, $files);

        // $files = array_filter($files);

        // dd($files);


        $storage = $this->storage($path);

        if (!Storage::exists($storage)) return redirect()->route('admin.file.index')->with('msg', 'Lỗi đường dẫn')->with('type', 'danger');

        $breadcrumb = getBreadcrumb($path);

        $folders = Storage::directories($storage);
        $files = Storage::files($storage);
        $folders = removePathPublic($folders);
        $files = removePathPublic($files);

        return view('modules.file.index', compact('folders', 'files', 'path', 'breadcrumb'));
    }


    public function addFolder(Request $request, $path = "")
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|regex:/^[^\/\\\.]+$/'
            ],
            [
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
                'regex' => ":attribute không được nhập các ký tự ( '/', '\', '.' )",
            ],
            [
                'name' => 'Tên'
            ]
        );


        if ($validator->fails()) return back()->withErrors($validator)->with('unAlert', true)->with('addFolder', true)->withInput();

        $storage = $this->storage($path);

        $newFolder = $storage  . '/' . trim($request->name);

        if (Storage::exists($newFolder)) return back()->withErrors(['name' => 'Folder đã tồn tại'])->with('unAlert', true)->with('addFolder', true)->withInput();

        Storage::makeDirectory($newFolder);

        return back()->with('alertJS', 'Tạo folder thành công');
    }


    public function addFiles(Request $request, $path = "")
    {

        $storage = $this->storage($path);

        if (!$request->file('files')) return back()->withErrors(['alert' => 'alert'])->with('addFile', true)->with('unAlert', true)->with('unfile', 'Vui lòng chọn ảnh.')->withInput();

        $validator = Validator::make(
            $request->all(),
            [
                'files.*' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'required' => 'Vui lòng chọn một file ảnh.',
                'file' => 'File bạn chọn không hợp lệ.',
                'mimes' => 'File phải là định dạng jpeg, png, jpg hoặc gif.',
                'max' => 'File quá lớn, vui lòng chọn file có kích thước nhỏ hơn 2MB.',
            ]
        );


        if ($validator->fails()) return back()->withErrors($validator)->with('unAlert', true)->with('addFile', true)->withInput();

        $files = $request->file('files');

        foreach ($files as $file) {

            $originalName = $file->getClientOriginalName();
            $hashName = rand(10000000, 99999999) . '_' . $originalName;
            Storage::putFileAs($storage, $file, $hashName);
        }

        return back()->with('alertJS', 'Tải file thành công');
    }


    public function deleteFolder($path = "")
    {

        $storage = $this->storage($path);

        if (!Storage::exists($storage)) return back()->with('unAlert', true)->with('addFile', true);

        Storage::deleteDirectory($storage);

        return back()->with('alertJS', 'Xóa folder thành công');
    }


    public function deleteFile($path = "")
    {

        $storage = $this->storage($path);

        if (!Storage::exists($storage)) return redirect()->route('admin.file.index')->with('msg', 'Lỗi đường dẫn')->with('type', 'danger');

        Storage::delete($storage);

        return back()->with('alertJS', 'Xóa file thành công');
    }


    public function renameFile(Request $request)
    {

        $storage = $this->storage($request->path);

        $fileName = getItemFinal($storage);
        $exe = getItemFinal($fileName, '.');

        if (!Storage::exists($storage)) return redirect()->route('admin.file.index')->with('msg', 'Lỗi đường dẫn')->with('type', 'danger');

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|regex:/^[a-zA-Z0-9\-_]+$/'
            ],
            [
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
                'regex' => ":attribute chỉ được phép điền A => Z, a => z, '-' và '_'",
            ],
            [
                'name' => 'Tên'
            ]
        );

        if ($validator->fails()) return back()->withErrors($validator)->with('pathRenameFile', $request->path)->with('btnRenameFile', $request->btn_rename_file_id)->with('unAlert', true)->withInput();

        $path = str_replace($fileName, '', $storage);
        $newName = $path . trim($request->name) . '.' . $exe;

        if (Storage::exists($newName)) return back()->withErrors(['name' => 'Tên đã có trong thư mục này'])->with('pathRenameFile', $request->path)->with('btnRenameFile', $request->btn_rename_file_id)->with('unAlert', true)->withInput();

        Storage::move($storage, $newName);

        return back()->with('alertJS', 'Đổi tên file thành công');
    }


    public function renameFolder(Request $request)
    {

        $storage = $this->storage($request->path);

        $folderName = getItemFinal($storage);

        if (!Storage::exists($storage)) return redirect()->route('admin.file.index')->with('msg', 'Lỗi đường dẫn')->with('type', 'danger');

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3|regex:/^[^\/\\\.]+$/'
            ],
            [
                'required' => ':attribute bắt buộc phải nhập',
                'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
                'regex' => ":attribute không được nhập các ký tự ( '/', '\', '.' )",
            ],
            [
                'name' => 'Tên'
            ]
        );

        if ($validator->fails()) return back()->withErrors($validator)->with('pathRenameFolder', $request->path)->with('btnRenameFolder', $request->btn_rename_folder_id)->with('unAlert', true)->withInput();

        $path = str_replace($folderName, '', $storage);
        $newName = $path . trim($request->name);

        if (Storage::exists($newName)) return back()->withErrors(['name' => 'Tên đã có trong thư mục này'])->with('pathRenameFolder', $request->path)->with('btnRenameFolder', $request->btn_rename_folder_id)->with('unAlert', true)->withInput();

        Storage::makeDirectory($newName);

        // Di chuyển tất cả các file từ thư mục cũ sang thư mục mới
        $files = Storage::allFiles($storage);
        foreach ($files as $file) {
            $newFilePath = str_replace($storage, $newName, $file);
            Storage::move($file, $newFilePath);
        }

        // Xóa thư mục cũ
        Storage::deleteDirectory($storage);

        return back()->with('alertJS', 'Đổi tên folder thành công');
    }


    static public function FolderCheckBoxChooseImageChap()
    {

        $static = new static;

        $folders = Storage::directories('public');
        $files = Storage::files('public');
        $files = array_map(function ($item) {
            if (!str_contains($item, '.gitignore')) return substr($item, 7);
        }, $files);
        $files = array_filter($files);

        $one = array_map(function ($item) {
            if (!str_contains($item, '.gitignore')) return $item;
        }, $folders);

        $one = array_filter($one);

        foreach ($one as $k1 => $v1) {
            $one[$v1] = [];
            unset($one[$k1]);
        }

        FileController::handle($one);
        FileController::handle1($one);
        FileController::handle2($one);
        $one = array_merge($files, $one);

        return $one;

    }

    static private function handle(&$arr){

        foreach ($arr as $k1 => $v1) {
            // $two[$k1] = Storage::directories('public/'.$k1);
            $two[$k1] = Storage::directories($k1);
            foreach ($two[$k1] as $k2 => $v2) {
                // $path = substr($v2, 7);
                $path = $v2;
                unset($two[$k1][$k2]);
                // $two[$k1][$path] = Storage::directories('public/'.$path);
                $two[$k1][$path] = Storage::directories($path);
                foreach ($two[$k1][$path] as $k3 => $v3) {
                    // $v3 = substr($v3, 7);
                    $v3 = $v3;
                    $two[$k1][$path][$v3] = [];
                    unset($two[$k1][$path][$k3]);
                }
                if(!empty($two[$k1][$path])){
                    if(is_array($two[$k1][$path])) FileController::handle($two[$k1][$path]);
                }
            }
        }

        $arr = $two;

    }


    static private function handle1(&$arr){

        foreach ($arr as $k1 => $v1) {
            // $files = Storage::files('public/'.$k1);
            $files = Storage::files($k1);
            $files = array_map(function($item){
                return substr($item, 7);
            }, $files);
            if(is_array($arr[$k1])){
            FileController::handle1($arr[$k1]);
            $arr[$k1] = array_merge($files, $arr[$k1]);
            }
            $show = getItemFinal($k1);
            $arr[$show] = $arr[$k1];
        }

    }


    static private function handle2(&$arr){
        foreach ($arr as $k1 => $v1) {
            if(is_array($arr[$k1])){
                if(str_contains($k1, 'public/')) unset($arr[$k1]);
                if(isset($arr[$k1]) && is_array($arr[$k1])){
                FileController::handle2($arr[$k1]);
                }
            }
        }
    }




}
