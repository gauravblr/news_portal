@extends('frontend.layouts.master') @section('content')
<div class="news--ticker"> </div>
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="main--content">
            <div class="post--items post--items-4 ptop--20" data-ajax-content="outer">
                <ul class="nav row" data-ajax-content="inner"> @if(!empty($featured_news))
                    <li class="col-md-8">
                        <div class="post--item post--layout-1 post--title-large">
                            <div class="post--img featured-image"> <a href="{{route('single', $featured_news[0]->slug)}}" class="thumb"><img src="{{$featured_news[0]->image}}" alt=""></a>
                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="{{route('writer', $featured_news[0]->writer->slug)}}">{{$featured_news[0]->writer->name}}</a></li>
                                        <li><a href="#">{{date('d F Y', strtotime($featured_news[0]->created_at))}}</a></li>
                                    </ul>
                                    <div class="title">
                                        <h2 class="h4"><a href="{{route('single', $featured_news[0]->slug)}}" class="btn-link">{{$featured_news[0]->title}}</a></h2> </div>
                                </div>
                            </div>
                        </div>
                        <hr class="divider hidden-md hidden-lg"> </li>@endif
                    <li class="col-md-4">
                        <ul class="nav"> @if(!empty($featured_news)) @foreach($featured_news as $key=> $featured) @php if($key==0){continue;}@endphp
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img tab-image"> <a href="{{route('single', $featured->slug)}}" class="thumb"><img src="{{$featured->image}}" alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="{{route('writer', $featured->writer->slug)}}">{{$featured->writer->name}}</a></li>
                                                <li><a href="#">{{date('d F Y', strtotime($featured->created_at))}}</a></li>
                                            </ul>
                                            <div class="title">
                                                <h3 class="h4"><a href="{{route('single', $featured->slug)}}" class="btn-link">{{$featured->title}}</a></h3> </div>
                                        </div>
                                    </div>
                                </div>
                            </li>@endforeach @endif </ul>
                    </li>
                </ul>
                <div class="preloader bg--color-0--b" data-preloader="1">
                    <div class="preloader--inner"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">
                        <div class="ptop--30">
                          <div class="col-lg-12 col-md-12 col-sm-12 post--items-title" data-ajax="tab">
                              <h2 class="h4">Asia News</h2>
                              <div class="nav">
                                  <a href="#" class="prev btn-link" data-ajax-action="load_prev_politics_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                  <a href="#" class="next btn-link" data-ajax-action="load_next_politics_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12 sec-one">
                            @if(!empty($world->posts))
                            <img class="lazy featured-image" src="{{ $world->posts[0]->image }}" alt="{{ basename($world->posts[0]->image) }}">
                            <div class="headline">
                                <h4>
                                    <a href="{{ route('single', $world->posts[0]->slug) }}">{{ $world->posts[0]->title }}</a>
                                </h4>
                                <p>{!! shortContent($world->posts[0]->description, 60) !!}...</p>
                            </div>
                            @endif
                            <!-- headline end -->
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="sec-two">
                              @if(!empty($world))
                                  @foreach($world->posts as $key => $worldLists)
                                  @php
                                      if($key === 0){
                                          continue;
                                      } elseif($key === 3){
                                          break;
                                      }
                                  @endphp
                                  <div class="summary-caption">
                                      <h4>
                                          <a href="{{ route('single', $worldLists->slug) }}">{{ $worldLists->title }}</a>
                                      </h4>
                                      <p>{!! shortContent($worldLists->description, 10) !!}...</p>
                                  </div>
                                  @endforeach
                              @endif
                              <div class="new-summ">
                                  <ul class="p0">
                                    @if(!empty($world))
                                        @foreach($world->posts as $key => $value)
                                        @php
                                            if($key === 0 || $key === 1 || $key === 2 || $key === 3){
                                                continue;
                                            }
                                        @endphp
                                        <li><a href="{{ route('single', $value->slug) }}">{{ $value->title }}</a>
                                        </li>
                                        @endforeach
                                    @endif

                                  </ul>
                              </div>
                              <!--new-summ end -->
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12 ptop--30 pbottom--30">
                            <div class="ad--space">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="7199912872"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>

                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Politics</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_politics_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_politics_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner"> @if(!empty($politics)) @foreach ($politics->posts as $key=> $value) @include('frontend.layouts.layout-two') @endforeach @endif </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Sports</h2>
                                <div class="nav">
                                    <a href="#" class="prev btn-link" data-ajax-action="load_prev_sports_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                    <a href="#" class="next btn-link" data-ajax-action="load_next_sports_posts"> <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="post--items post--items-3" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner"> @if(!empty($sports)) @foreach($sports->posts as $key=> $value) @include('frontend.layouts.layout-one') @endforeach @endif </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ptop--30 pbottom--30">
                            <div class="ad--space">
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="7199912872"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">

            </div>
        </div>
        <div class="row section">
          <div class="col-lg-12 col-md-12 col-sm-12 post--items-title" data-ajax="tab">
              <h2 class="h4">Health & Fitness</h2>
              <div class="nav">
                  <a href="#" class="prev btn-link" data-ajax-action="load_prev_politics_posts"> <i class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                  <a href="#" class="next btn-link" data-ajax-action="load_next_politics_posts"> <i class="fa fa-long-arrow-right"></i> </a>
              </div>
          </div>
        <div class="row">
            <div class="col-sm-5 artha-leftside">
                @if(!empty($health))
                    <img class="lazy featured-image" src="{{ $health->posts[0]->image }}" alt="{{ basename($health->posts[0]->image) }}">
                    <div class="artha-headline">
                        <h4>
                            <a href="{{ route('single', $health->posts[0]->slug) }}">{{ $health->posts[0]->title }}</a>
                        </h4>
                        <p>{!! shortContent($health->posts[0]->description, 50) !!}...</p>
                    </div>
                @endif
                <!--  artha-headline-->
            </div>
            <!--artha-leftside-->
            <div class="col-sm-4 artha-middleside">
                @if(!empty($health))
                    @foreach($health->posts as $key => $healthNews)
                    @php
                    if($key === 0){
                        continue;
                    } elseif($key === 4){
                        break;
                    }
                    @endphp
                    <h4>
                        <a href="{{ route('single', $healthNews->slug) }}">{{ $healthNews->title }}</a>
                    </h4>
                    <div class="row">
                        <div class=" col-sm-4 ath-title">
                            <img class="featured-image" style="width:100%" src="{{ $healthNews->image }}" alt="{{ basename($healthNews->image) }}">
                        </div>
                        <div class=" col-sm-8 phar-title">
                            <p>{{ shortContent($healthNews->description, 20) }}...</p>
                        </div>
                        <!--ath-title end -->
                    </div>
                    @endforeach
                @endif
            </div>
            <!--artha-middleside-->
            <div class="col-sm-3 new-summ">
                <ul class="listed-main-news p0">
                    @if(!empty($health))
                        @foreach($health->posts as $key => $healthNews)
                        @php
                            if($key === 0 || $key === 1 || $key === 2 || $key === 3){
                                continue;
                            }
                        @endphp
                        <li>
                            <a href="{{ route('single', $healthNews->slug) }}">{{ $healthNews->title }}</a>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 post--items-title" data-ajax="tab">
            <h2 class="h4">Entertainment</h2>
        </div>
        <div class="row">
              <div class="col-md-12">
                <div id="news-slider10" class="owl-carousel">
                <div class="post-slide10 new-summ">
                    @if(!empty($hollywood))
                    <img src="{{ $hollywood->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Hollywood</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $hollywood->posts[0]->slug) }}">{{ $hollywood->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($hollywood->posts as $key => $hollywoodNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $hollywoodNews->slug) }}">{{ $hollywoodNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="post-slide10 new-summ">
                    @if(!empty($bollywood))
                    <img src="{{ $bollywood->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Bollywood</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $bollywood->posts[0]->slug) }}">{{ $bollywood->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($bollywood->posts as $key => $bollywoodNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $bollywoodNews->slug) }}">{{ $bollywoodNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="post-slide10 new-summ">
                    @if(!empty($tollywood))
                    <img src="{{ $tollywood->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Tollywood</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $tollywood->posts[0]->slug) }}">{{ $tollywood->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($tollywood->posts as $key => $tollywoodNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $tollywoodNews->slug) }}">{{ $tollywoodNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="post-slide10 new-summ">
                    @if(!empty($kollywood))
                    <img src="{{ $kollywood->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Kollywood</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $kollywood->posts[0]->slug) }}">{{ $kollywood->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($kollywood->posts as $key => $kollywoodNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $kollywoodNews->slug) }}">{{ $kollywoodNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <!-- <div class="post-slide10 new-summ">
                    @if(!empty($fashion))
                    <img src="{{ $fashion->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Fashion</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $fashion->posts[0]->slug) }}">{{ $fashion->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($fashion->posts as $key => $fashionNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $fashionNews->slug) }}">{{ $fashionNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="post-slide10 new-summ">
                    @if(!empty($threatre))
                    <img src="{{ $threatre->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Fashion</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $threatre->posts[0]->slug) }}">{{ $threatre->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($threatre->posts as $key => $threatreNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $threatreNews->slug) }}">{{ $threatreNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="post-slide10 new-summ">
                    @if(!empty($music))
                    <img src="{{ $music->posts[0]->image }}" alt="">
                    <div class="post-date">
                        <span class="month">Music</span>
                    </div>
                    <h4 class="post-title">
                        <a href="{{ route('single', $music->posts[0]->slug) }}">{{ $music->posts[0]->title }}</a>
                    </h4>
                    <ul class="listed-main-news p0">
                      @foreach($music->posts as $key => $musicNews)
                      @php
                      if($key === 0){
                        continue;
                      }
                      @endphp
                        <li>
                            <a href="{{ route('single', $musicNews->slug) }}">{{ $musicNews->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div> -->
            </div>
              </div>
          </div>

        <br>
        <div class="col-lg-12 col-md-12 col-sm-12 post--items-title" data-ajax="tab">
            <h2 class="h4">More top stories</h2>
        </div>
        <div class="row text-center">
              <div class="col-md-8">
                @if(!empty($latest))
                    @foreach($latest as $latestNews)
                    <div class="col-md-4 more-stories">
                        <img src="{{ $latestNews->image }}" alt="">
                        <h4><a href="{{ route('single', $latestNews->slug) }}">{{ $latestNews->title }}</a></h3>
                    </div>
                    @endforeach
                @endif
              </div>
              <div class="col-md-4">
                  <div class="ptop--30">
                      <div class="ad--widget">
                          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins>
                          <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                          </script>
                      </div>
                  </div>

              </div>
          </div>

          <div class="col-lg-12 col-md-12 col-sm-12 post--items-title" data-ajax="tab">
              <h2 class="h4">Onlinekhabarhub Spotlight</h2>
          </div>
          <div class="row">
                <div class="col-md-12">
                    <div id="news-slider8" class="owl-carousel">
                        @if(!empty($trending_news))
                        @foreach($trending_news as $trends)
                        <div class="post-slide8">
                            <div class="post-img">
                                <img src="{{ $trends->image }}" alt="">
                                <a href="{{ route('single', $trends->title) }}">
                                  <div class="over-layer">
                                  </div>
                                </a>
                                <div class="post-date">
                                    <span class="month">
                                      @php
                                      if(!empty($trends->categories)){
                                        echo $trends->categories[0]->name;
                                      }
                                      @endphp
                                    </span>
                                </div>
                                <div class="post-title">
                                    <span class="title"><a href="{{ route('single', $trends->slug) }}">{{ $trends->title }}</a></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                <div class="sticky-content-inner">
                    <div class="row">
                      <div class="post--items post--items-5 pd--30-0">
                        <div class="post--items-title" data-ajax="tab">
                            <h2 class="h4">Technology</h2>
                        </div>
                        <ul class="nav">
                          @if(!empty($technology))
                          @foreach($technology->posts as $technology_news)
                          <li>
                              <div class="post--item post--title-larger">
                                  <div class="row">
                                      <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                                          <div class="post--img">
                                              <a href="{{ route('single', $technology_news->slug) }}" class="thumb"><img src="{{ $technology_news->image }}" alt=""></a> </div>
                                      </div>
                                      <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                                          <div class="post--info">
                                              <ul class="nav meta">
                                                  <li><a href="{{route('writer', $technology_news->writer->slug)}}">{{$technology_news->writer->name}}</a></li>
                                                  <li><a href="">{{date('d F Y', strtotime($technology_news->created_at))}}</a></li>
                                              </ul>
                                              <div class="title">
                                                  <h3 class="h4"><a href="{{ route('single', $technology_news->slug) }}" class="btn-link">{{ $technology_news->title }}</a></h3> </div>
                                          </div>
                                          <div class="post--content">
                                              <p>{{ shortContent($technology_news->description, 40) }}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          @endforeach
                          @endif
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                        @if(empty($youtube['error']))
                        <div class="col-md-12 ptop--30 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Latest On YouTube</h2>
                                <div class="nav"> <a href="https://www.youtube.com/channel/{{$channelID}}" target="_blank" class="next btn-link" data-ajax-action="load_next_photo_gallery_posts"> View all</a> </div>
                            </div>
                            <div class="post--items post--items-1" data-ajax-content="outer">
                                <ul class="nav row gutter--15" data-ajax-content="inner"> @if(!empty($youtube))
                                    <li class="col-md-12">
                                        <div class="post--item post--layout-1 post--title-large">
                                            <div class="post--img">
                                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$youtube['items'][0]['id']['videoId']}}" frameborder="0" scrolling="no" onload="resizeIframe(this)" allowfullscreen></iframe>
                                                <div class="post--info">
                                                    <ul class="nav meta">
                                                        <li><a>{{date('d F Y', strtotime($youtube['items'][0]['snippet']['publishedAt']))}}</a></li>
                                                    </ul>
                                                    <div class="title text-xxs-ellipsis">
                                                        <h2 class="h4"><a href="news-single-v1.html" class="btn-link">{{$youtube['items'][0]['snippet']['title']}}</a></h2>{{$youtube['items'][0]['snippet']['description']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>@endif @if($youtube) @foreach($youtube['items'] as $key=> $results) @php if($key===0){continue;}$video_id=isset($results['id']['videoId']) ? $results['id']['videoId'] : ""; @endphp
                                    <li class="col-md-4 col-xs-6 col-xxs-12">
                                        <div class="post--item post--layout-1">
                                            <div class="post--img">
                                                <iframe width="100%" src="https://www.youtube.com/embed/{{$video_id}}" frameborder="0" onload="resizeIframe(this)" allowfullscreen></iframe>
                                                <div class="post--info">
                                                    <div class="title">
                                                        <h5><a href="https://www.youtube.com/watch?v={{$video_id}}" target="_blank" class="btn-link">{{$results['snippet']['title']}}</a></h5> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>@endforeach @endif </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>@endif </div>
                </div>
            </div>
            <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">
                  @include('frontend.layouts.writer')
                  <div class="ptop--30">
                      <div class="ad--widget">
                          <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-2100563470763059" data-ad-slot="3340203692"></ins>
                          <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                          </script>
                      </div>
                  </div>
                  </div>
            </div>
        </div>

</div>
    </div>
</div>@endsection
