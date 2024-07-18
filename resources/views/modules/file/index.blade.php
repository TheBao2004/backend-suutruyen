@extends('layouts.admin')

@php

    $clickAddFile = 0;
    $AlertError = "'Alert'";
    $AlertJS = "'".session('alertJS')."'";
    $BtnRenameFile = session('btnRenameFile') ? "'".session('btnRenameFile')."'" : 0;
    $PathRenameFile = session('pathRenameFile') ? "'".session('pathRenameFile')."'" : 0;
    $BtnRenameFolder = session('btnRenameFolder') ? "'".session('btnRenameFolder')."'" : 0;
    $PathRenameFolder = session('pathRenameFolder') ? "'".session('pathRenameFolder')."'" : 0;


    if($errors->any() && session('addFile')){
        $clickAddFile = 1;
        $AlertError = session('unfile') ? "'".session('unfile')."'" : "'".$errors->all()[0]."'";
    }else{
        $clickAddFile = 0;
    }

    if($errors->any() && session('addFolder')){
        $clickAddFolder = 1;
    }else{
        $clickAddFolder = 0;
    }

@endphp

@section('script')
    <script>
    $(document).ready(function () {

        $('#OpenInputFiles').on('click', function(){
            $('#InputFiles').click();
        });

        const clickAddFolder = <?php echo $clickAddFolder; ?>;
        const clickAddFile = <?php echo $clickAddFile; ?>;
        const AlertError = <?php echo $AlertError; ?>;
        const AlertJS = <?php echo $AlertJS; ?>;
        const BtnRenameFile = <?php echo $BtnRenameFile; ?>;
        const PathRenameFile = <?php echo $PathRenameFile; ?>;
        const BtnRenameFolder = <?php echo $BtnRenameFolder; ?>;
        const PathRenameFolder = <?php echo $PathRenameFolder; ?>;

        if(BtnRenameFile){
            $(`#${BtnRenameFile}`).click();
            $('#pathRenameFile').val(PathRenameFile);
            $('#btnRenameFile').val(BtnRenameFile);
        }

        if(BtnRenameFolder){
            $(`#${BtnRenameFolder}`).click();
            $('#pathRenameFolder').val(PathRenameFolder);
            $('#btnRenameFolder').val(BtnRenameFolder);
        }

        if(clickAddFile){
            fireNotif(AlertError,'error', 3000);
        }

        if(AlertJS){
            fireNotif(AlertJS,'success', 3000);
        }

        if(clickAddFolder){
            $('#BtnFormAddFolder').click();
        }

        // $('.file-item-select-bg').on('click', function(){
        //     const tagA = $(this).parent('.file-item').find('.file-item-name');;
        //     tagA.click();
        // })

        $('.rename_file').on('click', function(){
            const path = $(this).data('path');
            const id = $(this).attr('id');
            $('#pathRenameFile').val(path);
            $('#btnRenameFile').val(id);
        });

        $('.rename_folder').on('click', function(){
            const path = $(this).data('path');
            const id = $(this).attr('id');
            console.log(path);
            console.log(id);
            $('#pathRenameFolder').val(path);
            $('#btnRenameFolder').val(id);
        });

    })
    </script>
@endsection

@section('sidebar')

    @include('components.sidebar')

@endsection


@section('modal')


<div class="modal fade" id="AddFolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddFolderLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('admin.file.addFolder', ['path' => $path]) }}" class="bg-secondary modal-content" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="AddFolderLabel">Thêm folder</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control w-100" placeholder="" value="{{ old('name') }}">
                <label>Tên</label>
                @error('name')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tạo</button>
        </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="MoveFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MoveFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="" class="bg-secondary modal-content" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="MoveFileLabel">Chuyển file</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control w-100" placeholder="" value="{{ old('name') }}">
                <label>Tên</label>
                @error('name')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Chuyển</button>
        </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="RenameFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="RenameFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('admin.file.renameFile') }}" class="bg-secondary modal-content" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="RenameFileLabel">Đổi tên file</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @csrf
            <input type="hidden" name="path" id="pathRenameFile">
            <input type="hidden" name="btn_rename_file_id" id="btnRenameFile">

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control w-100" placeholder="" value="{{ old('name') }}">
                <label>Tên</label>
                @error('name')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Đổi</button>
        </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="RenameFolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="RenameFolderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <form action="{{ route('admin.file.renameFolder') }}" class="bg-secondary modal-content" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-primary" id="RenameFolderLabel">Đổi tên folder</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @csrf
            <input type="hidden" name="path" id="pathRenameFolder">
            <input type="hidden" name="btn_rename_folder_id" id="btnRenameFolder">

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control w-100" placeholder="" value="{{ old('name') }}">
                <label>Tên</label>
                @error('name')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Đổi</button>
        </div>
      </form>
    </div>
  </div>



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
                        <h6 class="mb-4">Quản lí file</h6>

                        @if (!empty($path))

                            <nav aria-label="breadcrumb" >
                                <ol style="border-color: transparent;" class="breadcrumb bg-secondary">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.file.index') }}">Folder</a></li>
                                    @foreach ($breadcrumb['show'] as $key => $bre)
                                    <li class="breadcrumb-item"><a href="{{ route('admin.file.index', ['path' => $breadcrumb['path'][$key]]) }}">{{ $bre }}</a></li>
                                    @endforeach
                                </ol>
                            </nav>

                        @endif


                        <div class="file-manager-actions container-p-x py-2">

                            <div>
                                <button id="BtnFormAddFolder" data-bs-toggle="modal" data-bs-target="#AddFolder" type="button" class="btn btn-primary mr-2"><i class="fa fa-plus"></i> Tạo Folder</button>
                            {{-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)">Move</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Copy</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Remove</a>
                                </ul>
                            </div> --}}

                            </div>
                            <div>
                                <form action="{{ route('admin.file.addFiles', ['path' => $path]) }}" class="btn-group btn-group-toggle" data-toggle="buttons" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <button type="button" id="OpenInputFiles" class="btn btn-primary mr-2"><i class="fa fa-download"></i></button>
                                    <input type="file" multiple id="InputFiles" name="files[]" class="d-none">
                                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-file-download"></i> Tải File</button>
                                </form>
                            </div>
                            </div>

                            <hr>

                            <div class="file-manager-container file-manager-col-view">

                                {{-- <div class="file-item">
                                <div class="file-item-icon file-item-level-up fas fa-level-up-alt text-secondary text-light"></div>
                                <a href="javascript:void(0)" class="file-item-name">
                                ..
                                </a>
                                </div> --}}

                                {{-- @for ($i = 0; $i < 10; $i++) --}}
                                @forelse ($folders as $key => $folder)


                                <div class="file-item">

                                <a title="{{ getItemFinal($folder) }}" href="{{ route('admin.file.index', ['path' => $folder]) }}" class="file-item-select-bg bg-primary"></a>
                                <label class="file-item-checkbox custom-control custom-checkbox">
                                {{-- <input type="checkbox" class="custom-control-input" /> --}}
                                    {{-- <span class="custom-control-label"></span> --}}
                                </label>

                                <div class="file-item-icon far fa-folder text-secondary text-light"></div>

                                <a class="px-2 truncate-text file-item-name">
                                    {{ getItemFinal($folder) }}
                                </a>
                                <div class="file-item-changed">02/13/2018</div>


                                <div class="file-item-actions btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary text-center py-0 px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="background-color: #191C24; border-color: #EB1616">
                                            <span class="dropdown-item rename_folder"  id="rename_folder_{{ $key }}" data-bs-toggle="modal" data-bs-target="#RenameFolder" data-path="{{ $folder }}" style="color: #EB1616;">Đổi tên</span>
                                            {{-- <a class="dropdown-item" href="javascript:void(0)" style="color: #EB1616;">Chuyển</a> --}}
                                            <a class="dropdown-item" onclick="return confirm('Xác nhận')" href="{{ route('admin.file.deleteFolder', ['path' => $folder]) }}" style="color: #EB1616;">Xóa</a>
                                        </ul>
                                      </div>
                                </div>

                                </div>


                                @empty

                                @endforelse

                                {{-- @endfor --}}


                                @forelse ($files as $k => $file)


                                <div title="{{ getItemFinal($file) }}" class="file-item">

                                <div class="file-item-select-bg bg-primary"></div>
                                <label class="file-item-checkbox custom-control custom-checkbox">
                                {{-- <input type="checkbox" class="custom-control-input" /> --}}
                                    {{-- <span class="custom-control-label"></span> --}}
                                </label>

                                 <div class="file-item-img" style="background-image: url({{ asset(_HOST_ADMIN.'/'._STORAGE.'/' . rawurlencode($file)) }});"></div>

                                <a class="px-2 truncate-text file-item-name">
                                    {{ getItemFinal($file) }}
                                </a>
                                <div class="file-item-changed">02/13/2018</div>


                                <div class="file-item-actions btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-primary text-center py-0 px-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="background-color: #191C24; border-color: #EB1616">
                                            <span class="dropdown-item rename_file" id="rename_file_{{ $k }}" data-bs-toggle="modal" data-bs-target="#RenameFile" data-path="{{ $file }}" style="color: #EB1616;">Đổi tên</span>
                                            {{-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#MoveFile" style="color: #EB1616;">Chuyển</a> --}}
                                            {{-- <a class="dropdown-item" href="javascript:void(0)" style="color: #EB1616;">Nhân bản</a> --}}
                                            <a class="dropdown-item" onclick="return confirm('Xác nhận')" href="{{ route('admin.file.deleteFile', ['path' => $file]) }}" style="color: #EB1616;">Xóa</a>
                                        </ul>
                                    </div>
                                </div>

                                </div>


                                @empty

                                @endforelse



                                </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
