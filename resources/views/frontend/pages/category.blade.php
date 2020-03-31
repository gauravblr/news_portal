@extends('frontend.layouts.master')@section('content')<div class="news--ticker"></div><div class="main--breadcrumb"> <div class="container"> <ul class="breadcrumb"> <li><a href="{{url('/')}}" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li><li class="active"><span>{{Request::segment(1)}}/{{Request::segment(2)}}</span></li></ul> </div></div><div class="main-content--section pbottom--30"> <div class="container"> <div class="row"> <div class="main--content col-md-8 col-sm-7" data-sticky-content="true"> <div class="sticky-content-inner"> <div class="page--title ptop--30"> <h2 class="h2">News under{{ucwords(str_replace('-', ' ', Request::segment(2)))}}</h2> </div><div class="post--items post--items-2 pd--30-0"> <ul class="nav row AdjustRow"> @if(!empty($data)) @foreach($data->posts as $key=> $value) @if($key % 2==0) @if($key !==0) <li class="col-xs-12"> <hr class="divider divider--25"> </li>@endif @endif <li class="col-md-6 col-sm-12 col-xs-6 col-xss-12"> <div class="post--item post--layout-1 post--title-large"> <div class="post--img"> <a href="{{route('single', $value->slug)}}" class="thumb"><img src="{{$value->image}}" alt=""></a> <div class="post--info"> <ul class="nav meta"> <li><a href="{{route('writer', $value->writer->slug)}}">{{$value->writer->name}}</a></li><li><a href="#">{{date('d M Y', strtotime($value->created_at))}}</a></li></ul> <div class="title"> <h2 class="h4"><a href="{{route('single', $value->slug)}}" class="btn-link">{{$value->title}}</a></h2> </div></div></div><div class="post--content"> <p>{{shortContent($value->description, 30)}}</p></div><div class="post--action"> <a href="{{route('single', $value->slug)}}">Continue Reading...</a> </div></div></li>@endforeach @endif </ul> </div><div class="ad--space"> <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="7199912872"></ins> <script>(adsbygoogle=window.adsbygoogle || []).push({}); </script> </div><div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30"> <div class="text-right">{!! $paginate->render() !!}</div></div></div></div><div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true"> <div class="sticky-content-inner"> @include('frontend.layouts.category') <div class="widget"> <div class="widget--title"> <h2 class="h4">Advertisement</h2> <i class="icon fa fa-bullhorn"></i> </div><div class="ad--widget"> <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins> <script>(adsbygoogle=window.adsbygoogle || []).push({}); </script> </div></div><div class="widget"> <div class="widget--title"> <h2 class="h4">Archives</h2> <i class="icon fa fa-folder-open-o"></i> </div><div class="nav--widget"> <ul class="nav"> <li><a href="#"><span>March 2017</span><span>(22)</span></a></li><li><a href="#"><span>April 2017</span><span>(16)</span></a></li><li><a href="#"><span>May 2017</span><span>(84)</span></a></li><li><a href="#"><span>January 2016</span><span>(11)</span></a></li><li><a href="#"><span>February 2016</span><span>(19)</span></a></li><li><a href="#"><span>March 2016</span><span>(36)</span></a></li><li><a href="#"><span>April 2016</span><span>(41)</span></a></li><li><a href="#"><span>October 2015</span><span>(39)</span></a></li><li><a href="#"><span>Nover 2015</span><span>(15)</span></a></li><li><a href="#"><span>Decemberr 2015</span><span>(28)</span></a></li></ul> </div></div>@include('frontend.layouts.social') @include('frontend.layouts.tab') <div class="widget"> <div class="widget--title"> <h2 class="h4">Advertisement</h2> <i class="icon fa fa-bullhorn"></i> </div><div class="ad--widget"> <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins> <script>(adsbygoogle=window.adsbygoogle || []).push({}); </script> </div></div>@include('frontend.layouts.writer') </div></div></div></div></div>@endsection