@extends('frontend.layouts.master')
@section('content')
<div class="news--ticker"> </div>
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
            <li class="active"><span>Search</span></li>
        </ul>
    </div>
</div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="search--widget ptop--30">
                        <form action="{{ route('search') }}" data-form="validate">
                            <div class="input-group">
                                <input type="search" name="keyword" placeholder="Search..." class="form-control" required>
                                <div class="input-group-btn">
                                    <button type="submit" class="btn-link"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="page--title ptop--30">
                        <h2 class="h2">Search Results For: <span>{{ $word }}</span></h2> </div>
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
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Archives</h2> <i class="icon fa fa-folder-open-o"></i> </div>
                        <div class="nav--widget">
                            <ul class="nav">
                                <li><a href="#"><span>March 2017</span><span>(22)</span></a></li>
                                <li><a href="#"><span>April 2017</span><span>(16)</span></a></li>
                                <li><a href="#"><span>May 2017</span><span>(84)</span></a></li>
                                <li><a href="#"><span>January 2016</span><span>(11)</span></a></li>
                                <li><a href="#"><span>February 2016</span><span>(19)</span></a></li>
                                <li><a href="#"><span>March 2016</span><span>(36)</span></a></li>
                                <li><a href="#"><span>April 2016</span><span>(41)</span></a></li>
                                <li><a href="#"><span>October 2015</span><span>(39)</span></a></li>
                                <li><a href="#"><span>Nover 2015</span><span>(15)</span></a></li>
                                <li><a href="#"><span>Decemberr 2015</span><span>(28)</span></a></li>
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
