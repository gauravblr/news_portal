<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Featured News</h2> <i class="icon fa fa-newspaper-o"></i> </div>
    <div class="list--widget list--widget-1">
        <div class="list--widget-nav" data-ajax="tab">
            <ul class="nav nav-justified">
                <li class="active hot-news"> <a href="#hot-news" data-ajax-action="load_widget_hot_news">Hot News</a> </li>
                <li class="trendy-news"> <a href="#trendy-news" data-ajax-action="load_widget_trendy_news">Trendy News</a> </li>
            </ul>
        </div>
        <div class="post--items post--items-3" data-ajax-content="outer" id="hot-news">
            <ul class="nav" data-ajax-content="inner"> @if(!empty($recent_posts)) @foreach($recent_posts as $feature_list)
                <li>
                    <div class="post--item post--layout-3">
                        <div class="post--img tab-image"> <a href="{{route('single', $feature_list->slug)}}" class="thumb"><img src="{{$feature_list->image}}" alt=""></a>
                            <div class="post--info">
                                <ul class="nav meta">
                                    <li><a href="#">{{$feature_list->writer->name}}</a></li>
                                    <li><a href="#">{{date('d F Y', strtotime($feature_list->created_at))}}</a></li>
                                </ul>
                                <div class="title">
                                    <h3 class="h4"><a href="{{route('single', $feature_list->slug)}}" class="btn-link">{{$feature_list->title}}</a></h3> </div>
                            </div>
                        </div>
                    </div>
                </li>@endforeach @endif </ul>
        </div>
        <div class="post--items post--items-3" data-ajax-content="outer" id="trendy-news">
            <ul class="nav" data-ajax-content="inner">
              @if(!empty($featured_news)) @foreach($featured_news as $feature_list)
                <li>
                    <div class="post--item post--layout-3">
                        <div class="post--img"> <a href="{{route('single', $feature_list->slug)}}" class="thumb"><img src="{{$feature_list->image}}" alt=""></a>
                            <div class="post--info">
                                <ul class="nav meta">
                                    <li><a href="#">{{$feature_list->writer->name}}</a></li>
                                    <li><a href="#">{{date('d F Y', strtotime($feature_list->created_at))}}</a></li>
                                </ul>
                                <div class="title">
                                    <h3 class="h4"><a href="{{route('single', $feature_list->slug)}}" class="btn-link">{{$feature_list->title}}</a></h3> </div>
                            </div>
                        </div>
                    </div>
                </li>@endforeach @endif
               </ul>
        </div>
    </div>
</div>
