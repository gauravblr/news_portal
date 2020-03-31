@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>{{ @$data !== null ? 'Update' : 'Add' }} comment</h4>
                        </div>
                    </div>
                        {{ Form::open(['url'=>route('update_comment', @$data->id), 'class'=>'form', 'id'=>'comment_edit', 'files'=>true,'method'=>'patch']) }}
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">{{ $errors }}
                                                <div class="card-header-right">
                                                    <i class="icofont icofont-rounded-down"></i>
                                                    <i class="icofont icofont-refresh"></i>
                                                    <i class="icofont icofont-close-circled"></i>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="form-group row">
                                                    <div class="col-sm-1">
                                                        <label for="">Fullname</label>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control" value="{{ @$data->name }}" name="name" id="name" placeholder="Enter title for the user">
                                                        <input type="hidden" class="form-control" value="{{ @$employee_detail->slug }}" name="slug" id="slug">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">
                                                        <label for="">Email</label>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <input type="email" class="form-control" value="{{ @$data->email }}" name="email" id="email" placeholder="Unique email address">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">
                                                        <label for="">Status</label>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <select class="form-control" name="status">
                                                            <option selected disabled>--Select status--</option>
                                                            <option value="approve" @if(@$data->status == 'approve') selected @endif>Approve</option>
                                                            <option value="unapprove" @if(@$data->status == 'unapprove') selected @endif>Unapprove</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-1">
                                                        <label for="">Contact</label>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <textarea name="comment" rows="8" class="form-control">{{ @$data->comment }}</textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="post_id" value="{{ @$data->post_id }}">
                                                <div class="form-group row">
                                                    <label class="col-sm-2"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-danger m-b-0 pull-right ml-2">Publish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
