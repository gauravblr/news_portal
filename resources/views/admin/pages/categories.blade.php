@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Categories</h4><br>
                            <span>Add, edit or delete the blog category</span>
                        </div>
                    </div>
                    <br>
                    <div class="page-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div>
                                    <strong>Add new category</strong>
                                    <div class="card-block">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" name="name" required="" id="name">
                                            <span class="hint">The name is how it appears on your site.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input class="form-control" type="text" name="slug" required="" id="slug">
                                            <span class="hint">The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <input class="form-control" type="text" name="priority" required="" id="priority">
                                            <span class="hint">Lesser the number the first it comes in the navigation</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select class="form-control" name="parentcategories" id="parentcategories">
                                            </select>
                                            <span class="hint">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span>
                                        </div>
                                        <input type="submit" name="submit" value="Add New Category" class="btn btn-primary" id="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="basic-col-reorder" class="table table-striped table-bordered nowrap dataTable" role="grid" aria-describedby="basic-col-reorder_info">
                                                <thead class="inner">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Parent</th>
                                                    <th>Action </th>
                                                </tr>
                                                </thead>
                                                <tbody id="check">
                                                @if(!empty($allCategories))
                                                    @foreach($allCategories as $key => $categoryList)
                                                        <tr id="{{ $categoryList->id }}">
                                                            <input type="hidden" value="{{ $categoryList->id }}">
                                                            <td>{{ $categoryList->name }}</td>
                                                            <td>{{ $categoryList->slug }}</td>
                                                            <td>{{ $categoryList->category['name'] }}</td>
                                                            <td><a href="{{ route('editCategory', $categoryList->slug) }}"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" style="float: none;"><span class="icofont icofont-ui-edit"></span></button></a>  <button type="button" class="btn-sm btn btn-danger waves-effect waves-light table-delete" style="float: none;margin: 5px;" data-target="#sign-in-modal"><span class="icofont icofont-ui-delete"></span></button> </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
@section('scripts')
    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
    </script>
@include('admin.scripts.category')
@endsection