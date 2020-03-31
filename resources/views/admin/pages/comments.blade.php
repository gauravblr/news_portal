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
                                    <h4>{{ str_replace('-', ' ', ucfirst(Request::segment(2))) }}</h4>
                                    <span>Edit comments posted by viewers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
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
                                        <table id="basic-col-reorder" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Post title</th>
                                                    <th>Comment</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($allComments)) @foreach($allComments as $commentLists)
                                                <tr>
                                                    <td>{{ $commentLists->name }}</td>
                                                    <td>{{ $commentLists->email }}</td>
                                                    <td>{{ $commentLists->Post->title }}</td>
                                                    <td>{{ $commentLists->comment }}</td>
                                                    <td>
                                                        <a href="{{ route('edit_comment', $commentLists->id) }}" class="btn btn-primary btn-sm pull-left" style="margin-right: 5px">
                                                            <span class="icofont icofont-ui-edit"></span>
                                                        </a>
                                                        <a class="pull-left" onclick="return confirm('Are you sure you want to delete this comment?')">
                                                            <form method="POST" action="{{ route('update_delete', $commentLists->id) }}" accept-charset="UTF-8">
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
