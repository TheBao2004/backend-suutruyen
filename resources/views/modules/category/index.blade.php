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
                        <h6 class="mb-4">Danh sách danh mục</h6>
                        <div class="table-responsive">
                            <table class="table table-dark" id="table_seven">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">Id</th>
                                        <th scope="col" width="15%">Tên danh mục</th>
                                        <th scope="col">Danh mục con</th>
                                        <th scope="col" width="10%">Kích hoạt</th>
                                        <th scope="col" width="15%">Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($model as $key => $item)
                                        {{-- @for ($i = 0; $i < 10; $i++) --}}
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                {{ $item->name }}
                                                <br>
                                                <small><small class="">Slug: <span
                                                            class="text-primary">{{ $item->slug }}</span></small></small>
                                            </td>
                                            <td>

                                                @forelse ($item->children as $child)
                                                    <button
                                                        class="btn btn-primary rounded-pill m-2">{{ $child->name }}</button>
                                                @empty
                                                    Không có danh mục con
                                                @endforelse

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
                                                <a href="{{ route('admin.category.edit', ['item' => $item]) }}"
                                                    class="btn btn-warning">Sửa</a>
                                                |
                                                <form action="" method="post" class="d-inline-block">
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Chấp nhận')" type="submit"
                                                        class="btn btn-danger">
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
