@extends('layout.master')
@section('title')
    Đây là trang thêm catelogue
@endsection
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4>Thêm catelogue</h4>                    
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-success">Trash</button>
                <button class="btn btn-warning"><a href="{{route('admin.catelogues.index')}}">Back</a></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.catelogues.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Image</label>
                <input type="file" name="cover" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Is active</label>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="is_active" checked>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection