@php

use Illuminate\Support\Facades\Auth;

@endphp


      <!-- Sidebar Start -->
      <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-book me-2"></i>Admin Suu</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="{{ asset(_UPLOADS.'/'.Auth::user()->avatar) }}" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                </div>
            </div>
            <div class="navbar-nav w-100">

                <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Quản trị</a>

                <a href="{{ route('admin.file.index') }}" class="nav-item nav-link"><i class="fa fa-folder me-2"></i>Quản lí File</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-list-alt me-2"></i>Danh mục</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('admin.category.index') }}" class="dropdown-item">Danh sách</a>
                        <a href="{{ route('admin.category.add') }}" class="dropdown-item">Thêm</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-key me-2"></i>Từ khóa</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('admin.keyword.index') }}" class="dropdown-item">Danh sách</a>
                        <a href="{{ route('admin.keyword.add') }}" class="dropdown-item">Thêm</a>
                    </div>
                </div>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-book-open me-2"></i>Truyện</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('admin.comic.index') }}" class="dropdown-item">Danh sách</a>
                        <a href="{{ route('admin.comic.add') }}" class="dropdown-item">Thêm</a>
                    </div>
                </div>

            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
