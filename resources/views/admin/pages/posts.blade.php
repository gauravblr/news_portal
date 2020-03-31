@extends('admin.layouts.master')
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Posts</h4>
                                    <span>Articles on the website</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <a class="text-white" href="{{ route('posts.create') }}"><button class="btn btn-primary">Add Post</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Posts</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="basic-col-reorder" class="table table-striped table-bordered nowrap dataTable no-footer" role="grid" aria-describedby="basic-col-reorder_info">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($allPost)) @foreach($allPost as $postsLists)
                                                <tr>
                                                    <td>{{ $postsLists->title }}</td>
                                                    <td>
                                                        @if(!empty($postsLists->categories))
                                                            @foreach($postsLists->categories as $cat_lists)
                                                              <i class="icofont icofont-arrow-right"></i> {{$cat_lists->name}}<br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>{{ $postsLists->status }}</td>
                                                    {{-- <td><img src="{{ $postsLists->image }}" alt="" width="100"></td> --}}
                                                    <td><a href="{{ $postsLists->image }}" target="_blank">View image</a></td>
                                                    <td>
                                                        <a href="{{ route('posts.edit', $postsLists->id) }}" class="btn btn-primary btn-sm pull-left" style="margin-right: 5px">
                                                            <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a class="pull-left" onclick="return confirm('Are you sure you want to delete this post?')">
                                                                    <form method="POST" action="{{ route('posts.destroy', $postsLists->id) }}" accept-charset="UTF-8">
                                                                        <input name="_method" type="hidden" value="DELETE">
                                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                                        <button class="btn btn-danger btn-sm" type="submit"><span class="icofont icofont-ui-delete"></span></button>
                                                                    </form>
                                                                </a>
                                                    </td>
                                                </tr>
                                                @endforeach @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection