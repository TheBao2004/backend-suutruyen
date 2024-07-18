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

            <form method="POST" class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Sửa từ khóa - {{ $item->name }}</h6>

                @csrf
                @method('PUT')

                <div class="form-check form-switch mb-3 text-end">
                    <div class="d-inline-block">
                        <input value="1" @checked(old('active') ? old('active') : $item->active) name="active" class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label"> Kích hoạt </label>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control" placeholder="" value="{{ old('name') ?? $item->name }}">
                    <label>Tên</label>
                    @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>


            </form>
        </div>

            </div>
        </div>

    </div>

@endsection
