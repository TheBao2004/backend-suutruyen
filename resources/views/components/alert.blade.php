
@if (session('unAlert'))



@else

@if ($errors->any())
    <div class="alert alert-danger">
        Vui lòng kiểm tra form
    </div>
@endif

@if (session('msg') && !session('type'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

@if (session('msg') && session('type'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

@endif
