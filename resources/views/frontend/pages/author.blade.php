@extends('frontend.layouts.master')
@section('content')
@php
    $writer_name = Request::segment(2);
    $writer_name = str_replace('-', ' ', $writer_name);
@endphp
<div class="news--ticker"> </div>
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
            <li class="active"><span>{{ ucwords($writer_name) }}</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                @if(!empty($writer_detail->user_info))
                <div class="post--author-info clearfix">

                    <div class="img">
                        <div class="vc--parent">
                            <div class="vc--child"> <img src="{{ $writer_detail->image }}" alt="" data-rjs="2">
                                <p class="name">{{ $writer_detail->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="info">
                        <h2 class="h4">About The Author</h2>
                        <div class="content">
                            <p>{{ $writer_detail->user_info }}</p>
                        </div>
                    </div>

                </div>
                @endif
                <div class="sticky-content-inner">
                    @include('frontend.layouts.list')
                </div>
            </div>
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                    @include('frontend.layouts.category')
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Tags</h2> <i class="icon fa fa-tags"></i> </div>
                        <div class="tags--widget style--1">
                            <ul class="nav">
                                <li><a href="#">News</a></li>
                                <li><a href="#">Image</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Trendy</a></li>
                                <li><a href="#">Special</a></li>
                                <li><a href="#">Recipe</a></li>
                                <li><a href="#">Sports</a></li>
                            </ul>
                        </div>
                    </div>
                    @include('frontend.layouts.social')
                    @include('frontend.layouts.tab')
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Advertisement</h2> <i class="icon fa fa-bullhorn"></i> </div>
                        <div class="ad--widget">
                            <a href="#"> <img src="img/ads-img/ad-300x250-2.jpg" alt=""> </a>
                        </div>
                    </div>
                    @include('frontend.layouts.writer')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
