@extends('layouts.admin')

@section('sidebar')

    @include('components.sidebar')

@endsection


@section('root')

    <!-- Content Start -->
    <div class="content">

        @include('components.navbar')

        <div class="container-fluid pt-4 px-4">

            @include('components.alert')

            <div class="row g-4">


        <div class="col-12">

            <form method="POST" class="bg-secondary rounded h-100 p-4" enctype="multipart/form-data">
                <h6 class="mb-4">Thêm từ truyện</h6>

                @csrf

                <div class="form-check form-switch mb-3 text-end">
                    <div class="d-inline-block">
                        <input value="1" @checked(old('active')) name="active" class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label"> Kích hoạt </label>
                    </div>
                </div>

                <div class="row">

                <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder="" value="{{ old('name') }}">
                    <label>Tên</label>
                    @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>
                </div>

                <div class="col-3">
                <div class="form-floating mb-3">
                    <select class="form-select" name="status"
                        aria-label="Floating label select example">
                        <option @selected(old('status') == '1') value="1">Mới</option>
                        <option @selected(old('status') == '2') value="2">Cập nhập</option>
                        <option @selected(old('status') == '3') value="3">Hoàn thành</option>
                    </select>
                    <label>Trạng thái</label>
                </div>
                </div>

                <div class="col-3">
                <div class="form-floating mb-3">
                    <select class="form-select" name="book"
                        aria-label="Floating label select example">
                        <option @selected(old('book') == '0') value="0">Truyện tranh</option>
                        <option @selected(old('book') == '1') value="1">Truyện chữ</option>
                    </select>
                    <label>Loại</label>
                </div>
                </div>

                </div>

                <div class="mb-3">
                <label class="mb-2 d-block form-label">Danh mục</label>

                <div id="tagsContainer1" class="tags-container mb-2" style="border-radius: 5px"></div>

                @foreach ($categories as $cate)

                <div class="form-check d-inline mr-2">
                    <input @checked(in_array('danh-muc-'.$cate->id, old('categories') ?? [])) class="form-check-input checkbox" data-target="tagsContainer1" type="checkbox" name="categories[]" value="{{ 'danh-muc-'.$cate->id }}">
                    <label class="form-check-label">
                        {{ $cate->name }}
                    </label>
                </div>

                @endforeach
                @error('categories')
                <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-3">
                    <label class="mb-2 d-block form-label">Từ khóa</label>

                    <div id="tagsContainer2" class="tags-container mb-2" style="border-radius: 5px"></div>

                    @foreach ($keywords as $key)

                    <div class="form-check d-inline mr-2">
                        <input @checked(in_array('tu-khoa-'.$key->id, old('keywords') ?? [])) class="form-check-input checkbox" data-target="tagsContainer2" type="checkbox" name="keywords[]" value="{{ 'tu-khoa-'.$key->id }}">
                        <label class="form-check-label">
                            {{ $key->name }}
                        </label>
                    </div>

                    @endforeach

                    @error('keywords')
                    <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror

                    </div>

                <div class="mb-3">
                    <label class="form-label">Thumbnail</label>
                    <input class="form-control form-control-lg bg-dark" name="thumbnail" type="file">
                    @error('thumbnail')
                    <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label mb-2 d-block">Mô tả ngắn</label>
                    <textarea name="description" class="form-control ckeditor" id="" cols="30" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>


            </form>
        </div>

            </div>
        </div>

    </div>

@endsection
