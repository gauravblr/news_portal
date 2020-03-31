@extends('admin.layouts.master')
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Add Post</h4>{{ $errors }}
                            <span>Article that has to be displayed in the post </span>
                        </div>
                    </div>
                    @if(!empty($data))
                        {{ Form::open(['url'=>route('posts.update', $data->id), 'class'=>'form', 'id'=>'post_add', 'files'=>true,'method'=>'patch']) }}
                    @else
                        <form action="{{ route('posts.store') }}" method="POST">
                            @endif
                            @csrf
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Add Post</h5>
                                                <div class="card-header-right">
                                                    <i class="icofont icofont-rounded-down"></i>
                                                    <i class="icofont icofont-refresh"></i>
                                                    <i class="icofont icofont-close-circled"></i>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" value="{{ @$data->title }}" name="title" id="name" placeholder="Enter title for the post">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ @$data->slug }}" placeholder="URL starts generating once you start typing in the title field">
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <textarea name="excerpt" id="" rows="5" class="form-control" placeholder="Enter summary of the post">{{ @$data->excerpt }}</textarea>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <textarea name="description" id="" rows="10" class="form-control editor" placeholder="Enter post content">{{ @$data->description }}</textarea>
                                                        <span class="messages"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <select name="category_id[]" id="" class="form-control select-categories" multiple>
                                                            <option value="">Select Category</option>
                                                            @php
                                                            if($categories){
                                                                foreach ($categories as $categoryList){
                                                                    $checked = '';
                                                                    if(!empty($post_categories)){
                                                                        if (is_array($post_categories) || is_object($post_categories)) {
                                                                        foreach ($post_categories as $key => $value) {
                                                                        if($categoryList->id == $value['category_id']){
                                                                        $checked = 'selected';
                                                                        break;
                                                                        }
                                                                    }
                                                                    }
                                                                    }
                                                                    @endphp
                                                                    <option value="{{ $categoryList->id }}" {{ $checked}}>{{ $categoryList->name }}</option>
                                                                    @php
                                                                }
                                                            }
                                                            @endphp
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <select name="language" id="language" class="form-control mb-2">
                                                          <option selected disabled value="0">Select Language</option>
                                                            <option value="0" @if(@$data->language == 0) selected @endif>English</option>
                                                            <option value="1" @if(@$data->language == 1) selected @endif>नेपालि</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                      <div class="row">
                                                          <a style="margin-left:16px" href="{{ url('/vendor/filemanager/dialog.php?type=4&field_id=thumbnail&descending=1&sort_by=date&lang=undefined&akey=061e0de5b8d667cbb7548b551420eb821075e7a6') }}" class="btn iframe-btn btn-primary" type="button">
                                                              <i class="fa fa-picture-o"></i> Choose
                                                           </a>
                                                          <input id="thumbnail" class="form-control" placeholder="Featured image" value="{{ @$data->image }}" type="text" name="image" style="width: 84%; margin-left: -2px">
                                                      </div>
                                                      @if(!empty($data->image))
                                                          <img id="holder" src="{{ @$data->image }}" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px;margin-bottom:10px">
                                                      @else
                                                          <img id="holder" class="img-responsive img-thumbnail" style="margin-top:15px;max-height:240px;margin-bottom:10px">
                                                      @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="image_caption" class="form-control" value="{{ @$data->image_caption }}" placeholder="Featured image caption">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label style="padding-right: 10px">Has copyright?</label>
                                                        <input type="checkbox"  id="copyright" value="1">
                                                        <span style="margin-left: 2px">Yes</span>
                                                        <span class="messages popover-valid"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="caption_link">
                                                    <div class="col-sm-12">
                                                        <input type="text" name="caption_link" class="form-control" value="{{ @$data->caption_link }}" placeholder="Link to the caption">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label style="padding-right: 10px">Set as featured?</label>
                                                        <input type="checkbox"  @if(@$data->is_feature == 1) checked @endif  name="is_feature" id="set_featured" value="1">
                                                        <span style="margin-left: 2px">Yes</span> <br><br>
                                                        <span class="messages popover-valid"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-danger m-b-0 pull-right ml-2" name="status" value="publish">Publish</button>
                                                        <button type="submit" class="btn btn-primary m-b-0 pull-right" name="status" value="draft">Draft</button>
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
@section('scripts')
    <script>
        $("#name").keyup(function (){
            let Slug = $('#name').val();
            document.getElementById("slug").value = convertToSlug(Slug);
        });
        $(document).ready(function() {
            $('#caption_link').hide();
            $('.select-categories').select2({
                placeholder: "Categories for the news"
            });
            $('#copyright').on('click', function(){
                $('#caption_link').toggle(700);
            })
        });
    </script>
@endsection