@extends('admin.layout.master')
@section('title')
    Đây là trang danh sách
@endsection
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-primary"><a href="{{route('admin.catelogues.create')}}" class="text-light text-decoration-none">Add catelogue</a></button>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <button class="btn btn-success">List trash</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Is_active</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <img src="{{asset(Storage::url($item->cover))}}" alt="" width="50px">
                    </td>
                    <td>{!!$item->is_active
                            ?'<div class="badge bg-success">Yes</div>'
                            :'<div class="badge bg-danger">No</div>'
                    !!}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <button class="btn btn-info"><a href="{{route('admin.catelogues.edit',$item->id)}}">Edit</a></button>
                        <button class="btn btn-info"><a href="{{route('admin.catelogues.edit',$item->id)}}">Edit</a></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection