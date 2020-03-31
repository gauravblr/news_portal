@extends('frontend.layouts.master')@section('content')
<div class="news--ticker"> </div>
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
            <li class="active"><span>{{$data->title}}</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="post--item post--single post--title-largest pd--30-0">
                        <div class="post--cats">
                            <ul class="nav">
                                <li><span><i class="fa fa-folder-open-o"></i></span></li>@if(!empty($data->categories)) @foreach($data->categories as $cat_list)
                                <li><a href="{{route('category', $cat_list->slug)}}">{{$cat_list->name}}</a></li>@endforeach @endif </ul>
                        </div>
                        <div class="post--info">
                            <ul class="nav meta">
                                <li><a href="{{route('writer', $data->writer->slug)}}">by {{$data->writer->name}}</a></li>
                                <li><a>{{date('d F Y', strtotime($data->created_at))}}</a></li>
                            </ul>
                            <div class="title">
                                <h2 class="h4">{{$data->title}}</h2> </div>
                            <br>
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                        <div class="post--img">
                          <a href="#" class="thumb"><img src="{{$data->image}}" alt=""></a>
                        </div>
                        @if(!empty($data->image_caption))
                        <figcaption>
                          @if(!empty($data->caption_link))
                              <a href="{{ $data->caption_link }}" target="_blank">{{ $data->image_caption }}</a>
                          @else
                          {{ $data->image_caption }}
                          @endif

                        </figcaption>
                        @endif

                        <div class="post--content text-decor">
                          <div class="font-btn">
                              <a id="big">A</a>
                              <a id="normal">A</a>
                              <a id="small">A</a>
                          </div>
                        {!! $data->description !!}
                        </div>
                    </div>
                    <div class="ad--space pd--20-0-40" style="max-width:100%">
                        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-i1+f-1f-6n+hl" data-ad-client="ca-pub-2100563470763059" data-ad-slot="9168558522"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div class="post--related ptop--30">
                        <div class="post--items-title" data-ajax="tab">
                            <h2 class="h4">You Might Also Like</h2>
                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_related_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                <a href="#" class="next btn-link" data-ajax-action="load_next_related_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                        <div class="post--items post--items-2" data-ajax-content="outer">
                            <ul class="nav row" data-ajax-content="inner"> @if(!empty($related)) @foreach($related as $mightlike)
                                <li class="col-sm-6 hidden-xs pbottom--30">
                                    <div class="post--item post--layout-1">
                                        <div class="post--img"> <a href="#" class="thumb"><img src="{{$mightlike->image}}" alt=""></a>
                                            <div class="post--info">
                                                <ul class="nav meta">
                                                    <li><a href="{{route('writer', $mightlike->writer->slug)}}">by {{$data->writer->name}}</a></li>
                                                    <li><a>{{date('d F Y', strtotime($mightlike->created_at))}}</a></li>
                                                </ul>
                                                <div class="title">
                                                    <h3 class="h4"><a href="{{route('single', $mightlike->slug)}}" class="btn-link">{{$mightlike->title}}</a></h3> </div>
                                            </div>
                                        </div>
                                        <div class="post--content">
                                            <p>{!! shortContent($mightlike->description, 30) !!}</p>
                                        </div>
                                        <div class="post--action"> <a href="{{route('single', $mightlike->slug)}}">Continue Reading... </a> </div>
                                    </div>
                                </li>@endforeach @endif </ul>
                            <div class="preloader bg--color-0--b" data-preloader="1">
                                <div class="preloader--inner"></div>
                            </div>
                        </div>
                        <div class="comment--list pd--30-0">
                            <div class="post--items-title">
                              @php
                                $countPosts = count($postComment);
                              @endphp
                                <h2 class="h4">{{ $countPosts }} Comments</h2> <i class="icon fa fa-comments-o"></i> </div>
                            <ul class="comment--items nav">
                                @if(!empty($postComment))
                                    @foreach($postComment as $allComment)
                                        <li>
                                    <div class="comment--item clearfix">
                                        <div class="comment--info">
                                            <div class="comment--header clearfix">
                                                <p class="name">{{ $allComment->name }}</p>
                                                <p class="date">{{ date('d M Y', strtotime($allComment->created_at)) }} at {{ date('H:i A', strtotime($allComment->created_at)) }}</p></div>
                                            <div class="comment--content">
                                                <p>{{ $allComment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="comment--form pd--30-0">
                            <div class="post--items-title">
                                <h2 class="h4">Leave A Comment</h2> <i class="icon fa fa-pencil-square-o"></i> </div>
                            <div class="comment-respond">
                                <!-- <form action="{{ url('/comments') }}" data-form="validate" novalidate="novalidate" method="POST">
                                  @csrf -->
                                    <p>Don’t worry ! Your email address will not be published. Required fields are marked (*).</p>
                                    <p id="comment-message"></p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label> <span>Comment *</span>
                                                <textarea name="comment" class="form-control" required="" id="comment" aria-required="true"></textarea>
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label> <span>Name *</span>
                                                <input type="text" name="name" class="form-control" id="name" required="" aria-required="true"> </label>
                                            <label> <span>Email Address *</span>
                                                <input type="email" name="email" class="form-control" id="email" required="" aria-required="true"> </label>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" id="comment-submit">Post a Comment</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ @$data->id }}" id="post_id">
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="widget">
                        <div class="ad--widget">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>@include('frontend.layouts.social') @include('frontend.layouts.tab')
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Advertisement</h2> <i class="icon fa fa-bullhorn"></i> </div>
                        <div class="ad--widget">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                    <div class="widget">
                        <div class="widget--title" data-ajax="tab">
                            <h2 class="h4">Voting Poll (Radio)</h2>
                            <div class="nav">
                                <a href="#" class="prev btn-link" data-ajax-action="load_prev_poll_widget"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                <a href="#" class="next btn-link" data-ajax-action="load_next_poll_widget"> <i class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                        <div class="poll--widget" data-ajax-content="outer">
                            <ul class="nav" data-ajax-content="inner">
                                <li class="title">
                                    <h3 class="h4">Do you think the cost of sending money to mobile phone should be reduced?</h3> </li>
                                <li class="options">
                                    <form action="#">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1"> <span>Yes</span> </label>
                                            <p>65%<span style="width: 65%;"></span></p>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1"> <span>No</span> </label>
                                            <p>28%<span style="width: 28%;"></span></p>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option-1"> <span>Average</span> </label>
                                            <p>07%<span style="width: 07%;"></span></p>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Vote Now</button>
                                    </form>
                                </li>
                            </ul>
                            <div class="preloader bg--color-0--b" data-preloader="1">
                                <div class="preloader--inner"></div>
                            </div>
                        </div>
                    </div>@include('frontend.layouts.writer') </div>
            </div>
        </div>
    </div>
</div>@endsection
@section('scripts')
<script type="text/javascript">
    $( document ).ready(function(){
        $('#comment-submit').on('click', function(){
            let name = $('#name').val();
            let email = $('#email').val();
            let comment = $('#comment').val();
            let post_id = $('#post_id').val();
            $.ajax({
                method: "POST",
                url:"/comments",
                dataType: 'json',
                data: { _token:"{{ csrf_token() }}", "_method": 'POST',name:name,email:email,comment:comment, post_id: post_id},
                success: function(response) {
                    $('#name').val('');
                    $('#email').val('');
                    $('#comment').val('');
                    document.getElementById("comment-message").innerHTML = "<p id='message-comment' style='color: #c93a28'>"+response.data+"</p>";
                    setTimeout(function(){
                      $('#message-comment').hide(1000);
                    }, 4000);
                },
                error: function(response){
                  $('#name').val('');
                  $('#email').val('');
                  $('#comment').val('');
                  document.getElementById("comment-message").innerHTML = "<p id='message-comment' style='color: #c93a28'>"+response.data+"</p>";
                  setTimeout(function(){
                    $('#message-comment').hide(1000);
                  }, 4000);
                }
            });
        })
    })
</script>
@endsection
