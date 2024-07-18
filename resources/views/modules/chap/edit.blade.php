@extends('layouts.admin')

@section('css')
    <style>
        .box_drag_grop {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .item_drag_grop {
            height: 150px;
            width: 150px;
            background-color: black;
            display: flex;
            border-radius: 5px;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            cursor: move;
            transition: all 0.3s ease;
            border: 1px solid #EB1616;
        }

        .item_image_drag_grop {
            width: 100px;
            height: 100px;
            background-size: cover;
        }

        .ui-sortable-helper {
            background-color: lightcoral;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            transition: none;
        }

        .ui-state-highlight {
            height: 150px;
            width: 150px;
            border-radius: 5px;
            background-color: #EB1616;
            /* border: 2px dashed #ccc; */
            box-sizing: border-box;
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {


            const funcDragDrop = () => {

                $(".box_drag_grop").sortable({
                    placeholder: "ui-state-highlight",
                    revert: 200,
                    tolerance: "pointer",
                    start: function(event, ui) {
                        ui.helper.css('transform', 'scale(1.1)');
                    },
                    stop: function(event, ui) {
                        ui.item.css('transform', 'scale(1)');
                    }
                });
                $(".box_drag_grop").disableSelection();

            }

            const funcDeleteChecked = () => {
                $('.delete_item_drag_grop').on('click', function() {

                    $(this).parent('.item_drag_grop').remove();

                });
            }


            funcDragDrop();
            funcDeleteChecked();

            const funcUnChecked = () => {
                $('input[name="name_checkbox_choose_image[]"]').each(function() {
                    $(this).prop('checked', false);
                })
            }


            const Checked = () => {

                let choosed = false;

                $('input[name="name_checkbox_choose_image[]"]').each(function() {

                    if ($(this).is(':checked')) {

                        const path = $(this).attr('value');

                        $('.box_drag_grop').append(`
        <div class="item_drag_grop position-relative">
            <div class="item_image_drag_grop" style="background-image: url('${'http://127.0.0.1:8000/storage/' + path}')"></div>
            <input type="hidden" value="${path}" name="path_image_chap_comic[]">
            <span class="delete_item_drag_grop position-absolute top-0 start-100 translate-middle badge rounded-pill" style="cursor: pointer;">
                <i class="fa fa-times"></i>
            </span>
        </div>
    `);

                        choosed = true;

                    } else {

                    }

                });

                if (!choosed) fireNotif('Vui lòng chọn ảnh', 'error', 3000);

                funcDragDrop();
                funcUnChecked();
                funcDeleteChecked();

            }




            $('#CreateImageForChapComic').on('click', function() {

                Checked();

            });



        })
    </script>
@endsection

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
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-2">Truyện - {{ $item->comic->name }}</h6>
                                <h6 class="mb-4">Sửa chương - {{ $item->name }}</h6>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{ route('admin.chap.index', ['comic' => $item->comic]) }}">
                                    Danh sách
                                </a>
                            </div>
                        </div>

                        @csrf
                        @method('PUT')

                        <div class="form-check form-switch mb-3 text-end">
                            <div class="d-inline-block">
                                <input value="1" @checked(old('active') ? old('active') : $item->active) name="active" class="form-check-input"
                                    type="checkbox" role="switch">
                                <label class="form-check-label"> Kích hoạt </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" placeholder=""
                                        value="{{ old('name') ?? $item->name }}">
                                    <label>Tên</label>
                                    @error('name')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="stt" class="form-control" placeholder=""
                                        value="{{ old('stt') ?? $item->stt }}">
                                    <label>Thứ tự</label>
                                    @error('stt')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($item->comic->book == 0)

                            <div class="box_checkbox_image_chap border border-primary mb-3 p-3" style="border-radius: 5px">

                                <label class="form-label mb-2 d-block">Tạo ảnh</label>

                                <div class="accordion" id="accordionPanelsStayOpenExample">

                                    {{ htmlChooseImageChap($folderImage) }}

                                </div>

                                <div class="mt-3 text-end">
                                    <div class="btn btn-primary" id="CreateImageForChapComic">Tạo</div>
                                </div>

                            </div>

                            @error('path_image_chap_comic')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror

                            @php
                                $content = json_decode($item->content, true);
                            @endphp

                            <div class="border border-primary mb-3 p-3" style="border-radius: 5px">

                                <label class="form-label mb-2 d-block">Danh sách ảnh</label>

                                <div class="box_drag_grop">

                                    @if (old('path_image_chap_comic') || !empty($content))
                                        @foreach (old('path_image_chap_comic') ? old('path_image_chap_comic') : $content as $d)
                                            <div class="item_drag_grop position-relative">
                                                <div class="item_image_drag_grop"
                                                    style="background-image: url('{{ 'http://127.0.0.1:8000/storage/' . $d }}')">
                                                </div>
                                                <input type="hidden" value="{{ $d }}"
                                                    name="path_image_chap_comic[]">
                                                <span
                                                    class="delete_item_drag_grop position-absolute top-0 start-100 translate-middle badge rounded-pill"
                                                    style="cursor: pointer;">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                            </div>
                        @else
                            <div class="form-group mb-3">
                                <label class="form-label mb-2 d-block">Nội dung</label>
                                <textarea name="content" class="form-control ckeditor" id="" cols="30" rows="10">{{ old('content') ?? $item->content }}</textarea>
                                @error('content')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        @endif


                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection
