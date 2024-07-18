	@php

use App\Models\Chap;

@endphp

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
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Danh sách truyện</h6>
                        <div class="table-responsive">
                            <table class="table table-dark" id="table_five">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">Id</th>
                                        <th scope="col" width="">Tên truyện</th>
                                        <th scope="col" width="15%">Chương</th>
                                        <th class="text-start" scope="col" width="20%">Thumbnail</th>
                                        <th scope="col" width="15%">Trạng thái</th>
                                        <th scope="col" width="10%">Kích hoạt</th>
                                        <th scope="col" width="15%">Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($model as $key => $item)
                                    {{-- @for ($i = 0; $i < 10; $i++) --}}
                                        <tr>
                                            <td class="text-start">{{ $item->id }}</td>
                                            <td>
                                                {{ $item->name }}
                                                <br>
                                                <small><small class="">Slug: <span class="text-primary">{{ $item->slug }}</span></small></small>
                                            </td>
                                            <td class="text-start">
                                                <a href="{{ route('admin.chap.add', ['comic' => $item]) }}" class="btn btn-primary">Thêm</a>
                                                <hr>
                                                <a href="{{ route('admin.chap.index', ['comic' => $item]) }}" class="btn btn-primary">Danh sách</a>
                                                <hr>
                                                <p>Số chương: <span class="text-primary">{{ Chap::count($item->id) }}</span></p>
                                            </td>
                                            <td class="text-start">
                                                <img width="50%" src="{{ asset(_UPLOADS.'/' . $item->thumbnail) }}" alt="{{ $item->name }}">
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="btn btn-primary rounded-pill">Mới</div>
                                                @elseif($item->status == 2)
                                                    <div class="btn btn-primary rounded-pill">Cập nhật</div>
                                                @elseif($item->status == 3)
                                                    <div class="btn btn-primary rounded-pill">Hoàn thành</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->active)
                                                    <div class="btn btn-success rounded-pill">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                @else
                                                    <div class="btn btn-danger rounded-pill">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('admin.keyword.edit', ['item' => $item]) }}" class="btn btn-warning">Sửa</a> --}}
                                                <a href="{{ route('admin.comic.edit', ['item' => $item]) }}" class="btn btn-warning">Sửa</a>
                                                |
                                                <form action="" method="post" class="d-inline-block">
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Chấp nhận')" type="submit" class="btn btn-danger">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    {{-- @endfor --}}
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
